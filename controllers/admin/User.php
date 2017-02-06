<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once (APPPATH.'controllers/core/MY_Controller.php');

/*
 * @3riik web-design
 */

/**
 * Description of User
 *
 * @author eriik
 */
class User extends MY_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->library('user_agent');

    }
    
    public function index()
    {
    }
    
    public function login()
    {
        $this->data['page_title'] = 'Login';
        if($this->input->post())
        {
            //verify inputs
            $this->load->library('form_validation');
            $this->form_validation->set_rules('identity', 'Identity', 'required');
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_rules('remember','Remember me','integer');
            if ($this->form_validation->run()===TRUE)
            {
                $remember = (bool) $this->input->post('remember');
                if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
                {
                    $this->data['current_user'] = $this->ion_auth->user()->row();
                    $this->data['current_user_menu'] = $this->load->view('admin/logged_in_view',NULL,TRUE);
                    redirect($this->agent->referrer());
                }
                else
                {
                    $this->session->set_flashdata('message',  $this->ion_auth->errors());
                    redirect($this->agent->referrer());
                }
            }
        }    
        $this->load->helper('form');
        $this->render('admin/dashboard_view','admin_master');
        
    }
    public function logout()
    {
        $this->ion_auth->logout();
        redirect($this->agent->referrer());
    }
    public function profile()
    {
        if(!$this->ion_auth->logged_in())
        {
            redirect('admin');
        }
        $this->data['page_title'] = 'Upraviť';
        $user = $this->ion_auth->user()->row();
        $this->data['user'] = $user;
        $this->render('admin/user/profile_view','admin_master');
        
    }

    public function edit()
    {
        if(!$this->ion_auth->logged_in())
        {
            redirect('admin');
        }
        $this->data['page_title'] = 'Upraviť';
        $user = $this->ion_auth->user()->row();
        $this->data['user'] = $user;

        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name','Meno','trim');
        $this->form_validation->set_rules('last_name','Priezvisko','trim');
        $this->form_validation->set_rules('company','Spoločnosť');
        $this->form_validation->set_rules('phone','Telefón','trim');
        
        if($this->form_validation->run()===FALSE)
        {
            $this->render('admin/user/edit_profile_view','admin_master');
        }
        else
        {
            $new_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name'  => $this->input->post('last_name'),
                'company'    => $this->input->post('company'),
                'phone'      => $this->input->post('phone')
            );
            if(strlen($this->input->post('password'))>=8) $new_data['password'] = $this->input->post('password');
            $this->ion_auth->update($user->id, $new_data);
            
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect('admin/user/profile','refresh');
        }
    }
    public function register()
    {
        $this->data['page_title'] = 'Register';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name','Meno','trim');
        $this->form_validation->set_rules('last_name','Priezvisko','trim');
        $this->form_validation->set_rules('company','Spoločnosť','trim');
        $this->form_validation->set_rules('phone','Telefón','trim');
        $this->form_validation->set_rules('username','Prihlasovacie meno*','trim|required|is_unique[users.username]');
        $this->form_validation->set_rules('email','Email*','trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password','Heslo*','required');
        $this->form_validation->set_rules('password_confirm','Potvrdiť heslo','required|matches[password]');
        $this->form_validation->set_rules('g-recaptcha-response','Captcha','callback_recaptcha');
        
        if($this->form_validation->run()===FALSE)
        {
            $this->load->helper('form');
            $this->render('admin/user/register_view');
        }
        else
        {
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name'  => $this->input->post('last_name'),
                'company'    => $this->input->post('company'),
                'phone'      => $this->input->post('phone')
            );
            $this->ion_auth->register($username, $password, $email, $additional_data);
            $this->session->set_flashdata('message',  $this->ion_auth->messages());
            $this->ion_auth->login($username, $password);
            redirect('welcome');
            
        }
    }
    public function recaptcha($str='')
    {
        $google_url="https://www.google.com/recaptcha/api/siteverify";
        $secret = '6LfNfA4UAAAAALDH8Br2CNSc0eJh_ex_tVKXtUPL';
        $ip = $_SERVER['REMOTE_ADDR'];
        $url = $google_url."?secret=".$secret."&response=".$str."&remoteip=".$ip;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
        $res = curl_exec($curl);
        curl_close($curl);
        $res = json_decode($res, true);
        if($res['success'])
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('recaptcha','Chyba');
            return FALSE;
        }
    }
}

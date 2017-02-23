<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once (APPPATH.'controllers/core/MY_Controller.php');

/*
 * @3riik web-design
 */

/**
 * Description of Users
 *
 * @author eriik
 */
class Users extends Admin_Controller
{
    
    function __construct() {
        parent::__construct();
        if(!$this->ion_auth->in_group('admin'))
        {
            $this->session->set_flashdata('message','Prístup zamietnutý.');
            redirect('admin','refresh');
        }
    }
    
    public function index($group_id = NULL)
    {
        $this->data['page_title'] = 'Používatelia';
        $this->data['users'] = $this->ion_auth->users($group_id)->result();
        $this->render('admin/users/list_users_view');
    }
    
    public function create()
    {
        $this->data['page_title'] = 'Create user';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name','First name','trim');
        $this->form_validation->set_rules('last_name','Last name','trim');
        $this->form_validation->set_rules('company','Company','trim');
        $this->form_validation->set_rules('phone','Phone','trim');
        $this->form_validation->set_rules('username','Username','trim|required|is_unique[users.username]');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('password_confirm','Password confirmation','required|matches[password]');
        $this->form_validation->set_rules('groups[]','Groups','required|integer');

        if($this->form_validation->run()===FALSE)
        {
            $this->data['groups'] = $this->ion_auth->groups()->result();
            $this->load->helper('form');
            $this->render('admin/users/create_user_view');
        }
        else
        {
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $group_ids = $this->input->post('groups');

            $additional_data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'company' => $this->input->post('company'),
            'phone' => $this->input->post('phone')
            );
            $this->ion_auth->register($username, $password, $email, $additional_data, $group_ids);
            $this->session->set_flashdata('message',$this->ion_auth->messages());
            redirect('admin/users','refresh');
        }
    }
    
    public function edit($user_id = NULL)
    {
        $user_id = $this->input->post('user_id') ? $this->input->post('user_id') : $user_id;
        $this->data['page_title'] = 'Upraviť používateľa';
        $this->load->library('form_validation');
        $this->data['groups'] = $this->ion_auth->groups()->result();

        $this->form_validation->set_rules('first_name','First name','trim');
        $this->form_validation->set_rules('last_name','Last name','trim');
        $this->form_validation->set_rules('company','Company','trim');
        $this->form_validation->set_rules('phone','Phone','trim');
        $this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','min_length[6]');
        $this->form_validation->set_rules('password_confirm','Password confirmation','matches[password]');
        $this->form_validation->set_rules('groups[]','Groups','required|integer');
        $this->form_validation->set_rules('user_id','User ID','trim|integer|required');

        if($this->form_validation->run() === FALSE)
        {
            if($user = $this->ion_auth->user((int) $user_id)->row())
            {
            $this->data['user'] = $user;
            }
            else
            {
            $this->session->set_flashdata('message', 'Používateľ neexistuje.');
            redirect('admin/users', 'refresh');
            }
            if ($user_id == 1) 
            {
                $this->session->set_flashdata('message','Prístup zamietnutý.');
                redirect('admin/users','refresh');
            }
            $this->data['groups'] = $this->ion_auth->groups()->result();
            $this->data['usergroups'] = array();
            if($usergroups = $this->ion_auth->get_users_groups($user->id)->result())
            {
            foreach($usergroups as $group)
            {
                $this->data['usergroups'][] = $group->id;
            }
            }
            $this->load->helper('form');
            $this->render('admin/users/edit_user_view');
        }
        else
        {
            $user_id = $this->input->post('user_id');
            $new_data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'company' => $this->input->post('company'),
            'phone' => $this->input->post('phone')
            );
            if(strlen($this->input->post('password'))>=6) $new_data['password'] = $this->input->post('password');
            
            $this->ion_auth->update($user_id, $new_data);

            //Update the groups user belongs to
            $groups = $this->input->post('groups');
            if (isset($groups) && !empty($groups))
            {
            $this->ion_auth->remove_from_group('', $user_id);
            foreach ($groups as $group)
            {
                $this->ion_auth->add_to_group($group, $user_id);
            }
            }

            $this->session->set_flashdata('message',$this->ion_auth->messages());
            redirect('admin/users','refresh');
        }
    }
    
    public function delete($user_id = NULL)
    {
        if(is_null($user_id))
        {
            $this->session->set_flashdata('message','Používateľ neexistuje.');
        }
        elseif ($this->ion_auth->in_group('admin',$user_id))
        {
            $this->session->set_flashdata('message','Prístup zamietnutý.');
        }else
        {
            $this->ion_auth->delete_user($user_id);
            $this->session->set_flashdata('message',  $this->ion_auth->messages());
        }
        redirect('admin/users','refresh');
    }
    

    
}

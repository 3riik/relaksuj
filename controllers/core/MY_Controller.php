<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * @3riik web-design
 */

/**
 * Description of MY_Controller
 *
 * @author eriik
 */
class MY_Controller extends CI_Controller {
    
        /**
    * Description of MY_Controller
    *
    * @author eriik
        */
    
    protected $data = array();


    public function __construct() {
		parent::__construct();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
		$this->load->model('Pictures_model');
		$this->lang->load('auth');
		$categories = $this->Pictures_model->get_categories();
		$this->data = array(
            'page_title'        => 'Relaksuj',
            'before_head'       => '',
            'before_body'       => '',
            'group_menu'        => '',
            'current_user_menu' => '',
            'nav'               => NULL,
            'categories'        => $categories
        );
        
        if (!$this->ion_auth->logged_in())
        {
            $this->data['current_user_menu'] = $this->load->view('admin/login_view',NULL,TRUE);
        } else {
            $this->data['current_user'] = $this->ion_auth->user()->row();
            $this->data['current_user_menu'] = $this->load->view('admin/logged_in_view',NULL,TRUE);
        }
        if ($this->ion_auth->in_group('admin'))
        {
            $this->data['group_menu'] = $this->load->view('templates/_parts/user_menu_admin_view.php', NULL, TRUE);
        }
        if ($this->ion_auth->in_group('moderator'))
        {
            $this->data['group_menu'] = $this->load->view('templates/_parts/user_menu_moderator_view.php', NULL, TRUE);
        }
    }
    
    
    protected function render($the_view = NULL, $template = 'master')
    {
        if($template == 'json' || $this->input->is_ajax_request())
        {
            header('Content-Type: application/json');
            echo json_encode($this->data);
        }
        else
        {
            $this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view, $this->data, TRUE);
            $this->load->view('templates/'.$template.'_view', $this->data);
        }
    }
    public function is_author($uid)
    {
        $logged_in_user = $this->ion_auth->user()->row();
        $author = $this->ion_auth->user($uid)->row();
		return ($logged_in_user == $author) ? TRUE : FALSE;
    }
    public function can_edit($uid)
    {
        if($this->ion_auth->in_group('admin'))
        {
            return TRUE;
        }
        elseif($this->is_author($uid))
        {
            return TRUE;
        } 
        return FALSE;
    }

}

//---------------------------------------------------

class Admin_Controller extends MY_Controller
{
    function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in())
        {
            //redirect to the login page
            redirect('admin/user/login','refresh');
        }
    }
    
    protected function render($the_view = NULL, $template = 'admin_master')
    {
        parent::render($the_view, $template);
    }
}

//---------------------------------------------------

class Public_Controller extends MY_Controller
{
    function __construct() {
        parent::__construct();
    }
}

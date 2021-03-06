<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once (APPPATH.'controllers/core/MY_Controller.php');

/*
 * @3riik web-design
 */

/**
 * Description of Groups
 *
 * @author eriik
 */
class Groups extends Admin_Controller{
    
    function __construct() {
        parent::__construct();
        if(!$this->ion_auth->in_group('admin'))
        {
            $this->session->set_flashdata('message','Prístup zamietnutý.');
            redirect('admin','refresh');
        }
    }
    
    public function index()
    {
        $this->data['page_title'] = 'Skupiny';
        $this->data['groups']     = $this->ion_auth->groups()->result();
        $this->render('admin/groups/list_groups_view');
    }
    public function create()
    {
        $this->data['page_title'] = 'Vytvoriť skupinu';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('group_name','Názov skupiny','trim|required|is_unique[groups.name]');
        $this->form_validation->set_rules('group_description','Popis skupiny','trim|required');
        
        if($this->form_validation->run()===FALSE)
        {
            $this->load->helper('form');
            $this->render('admin/groups/create_group_view');
        }
        else
        {
            $group_name = $this->input->post('group_name');
            $group_description = $this->input->post('group_description');
            $this->ion_auth->create_group($group_name, $group_description);
            $this->session->set_flashdata('message',  $this->ion_auth->messages());
            redirect('admin/groups','refresh');
        }
    }
    public function edit($group_id = NULL)
    {
        $group_id = $this->input->post('group_id') ? $this->input->post('group_id') : $group_id;
        $this->data['page_title'] = 'Upraviť skupinu';
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('group_name','Názov skupiny','trim|required');
        $this->form_validation->set_rules('group_description','Popis skupiny','trim|required');
        $this->form_validation->set_rules('group_id','ID skupiny','trim|integer|required');
        
        if($this->form_validation->run() === FALSE)
        {
            if($group = $this->ion_auth->group((int) $group_id)->row())
            {
                $this->data['group'] = $group;
            }
            else
            {
                $this->session->set_flashdata('message','Skupina neexistuje.');
                redirect('admin/groups','refresh');
            }
            $this->load->helper('form');
            $this->render('admin/groups/edit_group_view');
        }
        else
        {
            $group_name = $this->input->post('group_name');
            $group_description = $this->input->post('group_description');
            $group_id = $this->input->post('group_id');
            
            if($group_id === '1' || $group_id === '2'){
                $this->session->set_flashdata('message','Túto skupinu nemôžeš upravovať.');
                redirect('admin/groups','refresh');
            }  else
            {
            $this->ion_auth->update_group($group_id, $group_name, $group_description);
            $this->session->set_flashdata('message',  $this->ion_auth->messages());
            redirect('admin/groups','refresh');
            }
        }     
    }
    public function delete($group_id = NULL)
    {
        if(is_null($group_id))
        {
            $this->session->set_flashdata('message','Skupina neexistuje');
        }  elseif($group_id === '1' || $group_id === '2')
            {
                $this->session->set_flashdata('message','Túto skupinu nemôžeš vymazať.');
                redirect('admin/groups','refresh');
            }
            else  
        {
            $this->ion_auth->delete_group($group_id);
            $this->session->set_flashdata('message',  $this->ion_auth->messages());
        }
        redirect('admin/groups','refresh');
    }
}

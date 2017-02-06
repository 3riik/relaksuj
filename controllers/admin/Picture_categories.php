<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once (APPPATH.'controllers/core/MY_Controller.php');


/*
 * @3riik web-design
 */

/**
 * Description of Picture_categories
 *
 * @author eriik
 */
class Picture_categories extends Admin_Controller {
    
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
        $this->data['page_title'] = 'Kategórie';
        $this->render('admin/picture_categories/list_categories_view');
    }
    public function create()
    {
        $this->data['page_title'] = 'Vytvoriť kategóriu';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('category_name','Názov kategórie','trim|required|is_unique[pictures_categories.name]');
        
        if($this->form_validation->run()===FALSE)
        {
            $this->load->helper('form');
            $this->render('admin/picture_categories/create_category_view');
        }
        else
        {
            $category_name = $this->input->post('category_name');
            $this->Pictures_model->createCategory($category_name);
            redirect('admin/categories','refresh');
        }
    }
    public function delete($category_id = NULL)
    {
        if(is_null($category_id))
        {
            $this->session->set_flashdata('message','Kategória neexistuje');
        } else
        {
            $category = $this->Pictures_model->get_categories($category_id);
            $pictures = $this->Pictures_model->get_category($category['name']);
            if(($this->Pictures_model->delete_category($category_id)))
            {
                foreach($pictures as $picture):
                    $path = FCPATH.'./uploads/img/'.$picture->slug.'.jpg';
                    unlink($path);
                    
                endforeach;
            }
            $this->session->set_flashdata('message','Kategória bola vymazaná.');
        }
        redirect('admin/categories','refresh');
    }
    public function edit($category_id = NULL)
    {
        $this->data['page_title'] = 'Upraviť kategóriu';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('category_name','Názov kategórie','trim|required|is_unique[pictures_categories.name]');
        
        if($this->form_validation->run() === FALSE)
        {
            if($category = $this->Pictures_model->get_categories($category_id))
            {
                $this->data['category'] = $category;
            }  else {
                $this->session->set_flashdata('message','Kategória neexistuje.');
                redirect('admin/categories','refresh');
            }
            $this->load->helper('form');
            $this->render('admin/picture_categories/edit_category_view');
        }  else {
            $this->Pictures_model->edit_category($category_id,$this->input->post('category_name'));
            redirect('admin/categories','refresh');
        }
    }
    
}

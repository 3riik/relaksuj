<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once ('core/MY_Controller.php');
/**
 * Controller pre obrázky
 *
 * @author eriik
 */
class Pictures extends MY_Controller{
    
    /**
     * Current page 
     * @var int 
     */
    protected $page;
    
    /**
     *  Number of pictures per page
     * @var int
     */
    protected $count; 

    public function __construct()
    {
        parent::__construct();
        $this->count = $this->Pictures_model->get_count();
	$this->page  = 1;
		
        $this->load->model('Pictures_model');
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library(array('form_validation'));     
        $this->data['pages_count'] = $this->Pictures_model->get_pages_count('pictures');
        $this->data['current_page'] = $this->page;
        $this->data['pictures']=  $this->Pictures_model->get_pictures($this->page,  $this->count);
        $this->data['upload_form'] = '';
        $this->data['delete_button'] = FALSE;
				
        if(!isset($_SESSION['count']) && empty($_SESSION['count'])){$_SESSION['count'] = 10;}
        if($this->ion_auth->logged_in())
        {
            $this->data['add_comment'] = TRUE;
            if($this->ion_auth->in_group(array('admin','moderator')))
            {
                $this->data['delete_button'] = TRUE;
            }
        }
    }
	
	protected function render($the_view = NULL, $template = 'admin_master')
    {
        parent::render($the_view, $template);
    }  
	/**
     * 
     * @param int $page
     * 
	 * Renders page
     */
	 
    public function index($page = FALSE)
    {
        if(!$page){
            $page = $this->page;
        }
        if($page<1) {$page = 1;}
        if($page > $this->data['pages_count'])
        {
            $page = $this->data['pages_count'];
        }
        $this->data['current_page'] = $page;
        $this->data['page_title'] = 'Obrázky';
        $this->data['pictures']=  $this->Pictures_model->get_pictures($page);
        $this->render('pictures/index');
    }
	/**
     * 
     * @param int $slug
     * 
	 * Shows one picture if exists
     */
    public function view($slug = FALSE)
    {
        
        $this->data['picture'] = $this->Pictures_model->get_picture($slug);
        $this->data['add_comment'] = FALSE;        
        if (empty($this->data['picture']))
        {
            redirect('pictures/index');
        }else {
            $this->data['page_title'] = $this->data['picture']->title;
            if($this->can_edit($this->data['picture']->uid))
            {
                $this->data['delete_button'] = TRUE;
            }
            if($this->ion_auth->logged_in())
            {
                $this->data['add_comment'] = TRUE;
            }
            $this->data['comments'] = $this->Pictures_model->get_comments($this->data['picture']->id);
            $this->render('pictures/view');
        }
    }
	/**
     * 
     * @param string $category
     * @param int $page
	 * @param int $count
	 * Render category
	 */    
    public function category($category, $page = FALSE, $count = FALSE)
    {
        if(!$page) {$page = $this->page;}
        if(!$count) {$count = $this->count;}
        $this->data['current_page'] = $page;
        $this->data['pages_count']  = $this->Pictures_model->get_pages_count('pictures',$category);
        $this->data['pictures'] = $this->Pictures_model->get_category($category,$page,$count);
        if(empty($this->data['pictures'])){
            $this->refreshData();
            redirect('pictures/index');
        }else
            {
        $this->data['current_category'] = $category;
        $this->data['page_title']   = $category;
        $this->render('pictures/category_view');
        }        
    }
	
	/**
     * 
     * @param int $count
     * 
	 * Sets number of pictures per page
     */	
	
    public function count($count)
    {
		$values = array(5,10,25,50);
		if(!in_array($count,$values))
		{
			$count = 10;
		}
        $this->session->set_userdata(array('count' => $count));
        $this->data['pages_count'] = $this->Pictures_model->get_pages_count('pictures');
		$this->load->library('user_agent');
        redirect($this->agent->referrer());	
	}
    
	/**
     *
	 * Add picture
     */    
    public function add()
    {
        
       //validácia
        if(!$this->ion_auth->in_group(array('admin','moderator')))
        {
            redirect('admin','refresh');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title','Nadpis','trim|required|htmlspecialchars');
        $this->form_validation->set_rules('description','Popis','htmlspecialchars');
        $config = array(
                        'upload_path'   =>'./uploads/img',
                        'allowed_types' =>'jpg|gif',
                        'max_size'      => 10000,
                        'file_name'     => $this->get_last_file_name()+1,
                        'title'         => $this->input->post('title'),
                        'description'   => $this->input->post('description'),
                        'category'      => $this->input->post('category'),
                        'uid'           => $this->ion_auth->user()->result()[0]->id
                );
        $this->load->library('upload',$config);

        
        if ($this->form_validation->run())
        {
            
            if ( ! $this->upload->do_upload('userfile'))
                {
                        $this->session->set_flashdata('message', $this->upload->display_errors());
                        redirect('pictures/add','refresh');
                }
                else        //vlozime
                {
                        
                        $data = array('title'       => $config['title'],
                                      'slug'        => $config['file_name'],  
                                      'description' => $config['description'],
                                      'filename'    => $config['file_name'],
                                      'file_ext'    => $this->upload->data('file_ext'),
                                      'category'    => $config['category'],
                                      'uid'         => $config['uid']);
                        if ($this->upload->data('file_ext') == '.gif')
                        {
                            $this->create_jpeg($data);
                        }
                        if($this->Pictures_model->add_picture($data))
                            {
                        $this->data['picture'] = $this->Pictures_model->get_picture($data['slug']);
                        $this->session->set_flashdata('message','Obrázok bol úspešne pridaný');
                        $this->render('pictures/view');
                            }
                }   
        }
        else 
        {
            $this->refreshData();    
            $this->render('pictures/upload_form_view');            
        }
    }
	/**
     *  
     * Creates jpg from gif and adds watermark 
     */
    private function create_jpeg($data)
	{
        $file_path = 'uploads/img/'.$data['filename'].$data['file_ext'];
        $image = imagecreatefromgif($file_path);
        imagejpeg($image, 'uploads/img/'.$data['filename'].'.jpg');
        /*$this->load->library('image_lib');
		$config = array('width' 		  => '50',
						'height' 		  => '50',
						'source_image'	  => 'uploads/img/'.$data['filename'].'.jpg',
						'wm_overlay_path' => 'assets/img/wm-gif.png',
						'wm_type'		  => 'overlay',
						'padding'		  => '50',
						'wm_opacity'	  => '100',
						'wm_vrt_alignment'=> 'middle',
						'wm_hor_alignment'=> 'center');
        $this->image_lib->initialize($config);
        $this->image_lib->watermark();*/
        return;
    }
    private function get_last_file_name()
    {
        return $this->Pictures_model->get_last_file_name();
    }
    private function refreshData()
    {
        $this->data['pictures'] = $this->Pictures_model->get_pictures();
    }
	/**
     * 
     * @param int $slug
     * 
	 * Delete picture
     */		
    public function delete($slug = NULL)
    {
        $data['picture'] = $this->Pictures_model->get_picture($slug);
       if (!empty($data['picture'])){
        if(!$this->can_edit($data['picture']->uid))        
        {
            $this->session->set_flashdata('message','Prístup zamietnutý.');
            redirect('pictures/index');
        }
        if(empty($data['picture']))
        {
           $this->render('pictures/index');
        }  elseif ($this->ion_auth->logged_in())
        {
            $succes = $this->Pictures_model->delete_picture($slug);
            if($succes)
            {
                $path = FCPATH.'./uploads/img/'.$slug.$data['picture']->file_ext;
                unlink($path);
                if($data['picture']->file_ext == '.gif')
                {
                    $path = FCPATH.'./uploads/img/'.$slug.'.jpg';
                    unlink($path);
                }
            }
            $this->data['pictures'] = $this->Pictures_model->get_pictures();
            $this->session->set_flashdata('message','Obrázok bol vymazaný.');
            $this->render('pictures/index');
            } else {
              $this->refreshData();
              $this->render('pictures/index');
            }
       } else {
       	$this->refreshData();
       	$this->render('pictures/index');
       }
    
    }
	/**
     * 
     * @param int $slug
     * 
	 * Edit picture
     */		
    public function edit($slug)
    {        
        $this->data['page_title'] = 'Upraviť';
        $this->data['picture'] = $this->Pictures_model->get_picture($slug);
        if(!$this->can_edit($this->data['picture']->uid))        
        {
            $this->session->set_flashdata('message','Prístup zamietnutý.');
            redirect('pictures/index');
        }
        
        if(empty($this->data['picture']))
        {
            $this->render('pictures/index');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title','Nadpis','trim|required|htmlspecialchars');
        $this->form_validation->set_rules('description','Popis','htmlspecialchars');
        $this->form_validation->set_rules('category','Kategória','required|integer');
        if($this->form_validation->run() ===FALSE){
            $this->render('pictures/edit_picture_view');
        }
        else
        {
            $new_data = array (
                'title'       => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'category'    => $this->input->post('category')
                    );
            if($this->Pictures_model->update_picture($slug,$new_data))
            {
            $this->session->set_flashdata('message','Obrázok bol úspešne upravený.');
            redirect('pictures/view/'.$slug,'refresh');
            }
            else {
                    $this->session->set_flashdata('message','Obrázok nebol upravený.');
                 }
        }
    }
    
 	/**
     * 
     * @param int $slug
     * 
	 * Add comment for picture
     */	
   
    public function addComment($slug)
    {
        if(!$this->ion_auth->logged_in())
        {
            return FALSE;
        }
        $picture = $this->Pictures_model->get_picture($slug);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('comment','comment','required|htmlspecialchars');
        if($this->form_validation->run())
        {
            $uid     = $this->ion_auth->user()->row()->id;
            $data = array(
                'text'       => $this->input->post('comment'),
                'uid'        => $uid,
                'picture_id' => $picture->id
            );
            if($this->Pictures_model->add_comment($data))
            {
                $this->session->set_flashdata('message','Komentár bol pridaný');
            } 
            else
            {
                $this->session->set_flashdata('message','Chyba pri pridávaní komentára');
            }
        } 
        redirect('pictures/view/'.$picture->slug);
    }
    //upraviť aby sa to zhodovalo so zobrazením tlačítka vymazať
	/**
     * 
     * @param int $id
     * 
	 * Delete comment
     */		
    public function deleteComment($id)
    {
        $comment = $this->Pictures_model->get_comment($id);
        $picture = $this->Pictures_model->get_picture_by_id($comment->picture_id);
        if($this->can_edit($comment->uid) || $this->ion_auth->in_group('moderator')){
            $this->Pictures_model->delete_comment($id);
            $this->session->set_flashdata('message','Komentár bol vymazaný.');
        }
        redirect('pictures/view/'.$picture->slug);
    }
     
}
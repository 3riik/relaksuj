<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Pictures_model
 * 
 * Database access for work with pictures
 *
 * @author eriik
 */
class Pictures_model extends CI_Model{
    
/*
 * Functions for work with pictures
 * ================================
 */    
    protected $count;

	/**
	 * Constructor
	 * Sets default count if not set
	 */
    public function __construct()
    {
        parent::__construct();
		if(isset($_SESSION['count']) && !empty($_SESSION['count']))
		{
			$this->count = $this->session->count;
		}
		else
		{ 
			$this->count = 10; 
		}
	}
	public function get_count()
	{
		return $this->count;
	}
	/**
     * 
     * @param int $slug
     * @return stdClass
     * 
     * Returns one picture when used with argument
     * Returns all pictures when used without argument
     */	
    public function get_pictures($page = FALSE)
    {
        $lower = ($page-1)*$this->count;
        if($lower < 0) {$lower = 0;}
        $this->db->from('pictures');
        $this->db->order_by('pictures.time desc');
        $this->db->limit($this->count,$lower);
        $q = $this->db->get();
        return $q->result();
    }
    /**
	 *
     * @param int $slug
     * @return array
     * Returns one picture 
     */	
    public function get_picture($slug)
    {
        $q = $this->db->get_where('pictures',array('slug' =>$slug));
        return $q->row();
    }
    /**
	 *
     * @param int $id
     * @return stdClass
     * Returns one picture 
     */		
    public function get_picture_by_id($id)
    {
        $q = $this->db->get_where('pictures',array('id' => $id));
        return $q->row();
    }
    
    /**
     * Add picture to database
     * @param array $data
     * @return boolean
     * Returns TRUE on success
     */

    public function add_picture($data)
    {
        $success = $this->db->insert('pictures',$data);
        return $success;
    }
    
    /**
     * Update picture in database
     * @param int $slug
     * @param array $data
     * @return boolean 
     * Returns True on success
     */
    public function update_picture($slug, $data)
    {
        $this->db->where('slug',$slug);
        return $this->db->update('pictures',$data);       
    }
    /**
     * @return int
     * Returns filename of the last picture 
     */
    public function get_last_file_name()
    {
        $this->db->select_max('filename');
        $query = $this->db->get('pictures');
        return (int)$query->row()->filename;
    }
    /**
     * @param int $slug
     * @return boolean
     * Returns TRUE on success
     */
    public function delete_picture($slug)
    {
        return $this->db->delete('pictures', array('slug' => $slug));
    }
    
/*
 * Functions for work with categories
 ============================================
 */
    /**
     * 
     * @param int $id
     * @return mixed
     * Returns all categories rows if used without argument
     * Returns one category row if used with ID as argument 
     */
    public function get_categories($id = FALSE)
    {
        if ($id === FALSE)
        {
            $q = $this->db->order_by('id')
                    ->get('pictures_categories');
            return $q->result();
        }
        
        $q = $this->db->get_where('pictures_categories', array('id' =>$id));
        return $q->row_array();
    }
    /**
     * 
     * @param string $name
     * @return stdClass
     * Returns category row
     */	
    public function get_category_by_name($name)
    {
        $q = $this->db->get_where('pictures_categories', array('name' =>$name));
        return $q->row();
    }
    /**
     * Takes name of the category as parameter
     * @param string $category 
     * @return stdClass
     * Returns pictures from category
     */
    public function get_category($category, $page = FALSE)
    {
        $lower = ($page-1)*$this->count;
		$category_id = $this->get_category_by_name($category)->id;
        if($lower < 0) {$lower = 0;} //page cant be -1
        $this->db->order_by('time desc');
        $this->db->limit($this->count,$lower); //choose interval in accordance to page and count per page
        $q = $this->db->get_where('pictures', array('category' => $category_id)); 
        return $q->result();
    }
    /**
     * @param string $table
	 * @param string $category
     * @return int
     * Returns number of pages for different number of articles 
     */	
	
    public function get_pages_count($table,$category = FALSE)
    {
        if($this->count==0){
            $this->count = 10;  //count cant be zero, set default value
        }
        if(!$category){
            $this->db->from($table);
            $q = $this->db->get();
        }else
        {
            $q = $this->db->get_where('pictures', array('category' => $this->get_category_by_name($category)->id));
		}
        $rowcount = $q->num_rows();
        $pages_count = (int)($rowcount/($this->count));
        if ($rowcount%$this->count == 0) {return $pages_count;}
        else {return $pages_count+1;}
    }
    /**
     * @param string $name
     * @return boolean
     * Returns TRUE on succes 
     */		
    public function createCategory($name)
    {
        setlocale(LC_ALL, 'sk_SK.UTF8'); 
        $data = array(
            'name' => iconv("UTF-8", "ASCII//TRANSLIT", $name),
            'description' => $name
        );
        return $this->db->insert('pictures_categories',$data);
    }
    /**
     * @param int $id
     * @return boolean
     * Returns TRUE on succes 
     */		
    public function delete_category($id)
    {
        return $this->db->delete('pictures_categories', array('id' => $id));
    }
    /**
     * @param int $id
     * @param string $new_name
     * @return boolean
     * Returns TRUE on succes 
     */		
    public function edit_category($id, $new_name)
    {
        setlocale(LC_ALL, 'sk_SK.UTF8');
        $new_name = str_replace(' ', '', $new_name);
        $data = array(
            'name' => iconv("UTF-8", "ASCII//TRANSLIT", $new_name),
            'description' => $new_name
        );
        $this->db->where('id',$id);
        return $this->db->update('pictures_categories',$data);
    }
    
/**
 * Working with comments
 * =====================
 */
	 
    /**
     * @param array $data
     * @return boolean
     * Returns TRUE on succes 
     */		
    public function add_comment($data)
    {
        $success = $this->db->insert('picture_comments',$data);
        return $success;
    }
    /**
     * @param int $picture_id
     * @return stdClass
     * Returns all comments for one picture 
     */		
    public function get_comments($picture_id)
    {
        $q = $this->db->get_where('picture_comments',array('picture_id' => $picture_id));
        return $q->result();
    }
    /**
     * @param int $id
     * @return boolean
     * Returns TRUE on success
     */		
    public function delete_comment($id)
    {
        return $this->db->delete('picture_comments',array('id' =>$id));
    }
    /**
     * @param int $id
     * @return stdClass
     * Returns one comment by id 
     */		
    public function get_comment($id)
    {
        $q = $this->db->get_where('picture_comments',array('id' => $id));
        return $q->row();
    }
    public function get_comments_count($picture_id)
    {
        $this->db->from('picture_comments');
        $this->db->where('picture_id',$picture_id);
        $q = $this->db->get();
        return $q->num_rows();
    }
	

}

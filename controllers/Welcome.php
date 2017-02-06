<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once ('core/MY_Controller.php');


/*
 * @3riik web-design
 */

/**
 * Description of Welcome
 *
 * @author eriik
 */
class Welcome extends MY_Controller{

    function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->render('welcome');
    }
    protected function render($the_view = NULL, $template = 'admin_master')
    {
        parent::render($the_view, $template);
    }
}

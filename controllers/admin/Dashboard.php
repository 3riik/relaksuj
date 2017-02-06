<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once (APPPATH.'controllers/core/MY_Controller.php');
/*
 * @3riik web-design
 */

/**
 * Description of Dashboard
 *
 * @author eriik
 */
class Dashboard extends Admin_Controller
{
    function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        $this->render('admin/dashboard_view');
    }
      public function view()
    {
        $this->render('admin/dashboard_view');
    }
    
}

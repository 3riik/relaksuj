<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * @3riik web-design
 */
?>
<h1><?= $this->Pictures_model->get_category_by_name($current_category)->description;?></h1>
<?php $this->load->view('pictures/category_navigation_view'); ?>


<div class="line"></div>

<!--
Výpis z databázy
-->
<?php $this->load->view('pictures/show_pictures_view'); ?>

<?php $this->load->view('pictures/category_navigation_view'); ?>

        
        
       
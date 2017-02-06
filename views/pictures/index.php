<?php defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * @3riik web-design
 */

?>
<h1>Všetky obrázky</h1>
<?php $this->load->view('pictures/navigation_view'); ?>
<div class="line"></div>
    
<!--
Výpis z databázy
-->
<?php $this->load->view('pictures/show_pictures_view');?>

<?php $this->load->view('pictures/navigation_view'); ?>

        
        
       
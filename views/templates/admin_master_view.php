<?php defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * @3riik web-design
 */

$this->load->view('templates/_parts/admin_master_header_view'); ?>

<div class = "col-xs-12 col-sm-8 col-md-6 top-color basic-container" id="content">
<?php if($this->session->flashdata('message'))
    {
    ?>
	<span class="message">
    <div class="alert alert-success alert-dismissible" role="alert" >
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="color:black;">&times;</span></button>
      <?php echo $this->session->flashdata('message');?>
    </div>
	</span>
<?php
}
?> 
    
	
  <?php echo $the_view_content; ?>
   hhahahahahah
</div>
<div class = "col-md-3 col-sm-3 hidden-xs menu" >
<?php $this->load->view('templates/_parts/admin_master_rightmenu_view');?>
</div>
</div>
<?php $this->load->view('templates/_parts/admin_master_footer_view');?>

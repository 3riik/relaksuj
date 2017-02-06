<?php defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * @3riik web-design
 */

$this->load->view('templates/_parts/admin_master_header_view'); ?>

<div id="content">
    <?php if($this->session->flashdata('message'))
    {
    ?>
    <div class="container" style="padding-top:40px;">
    <div class="alert alert-info alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <?php echo $this->session->flashdata('message');?>
    </div>
  </div>
<?php
}
?>
  <?php echo $the_view_content; ?>
  </div>
<?php $this->load->view('templates/_parts/admin_master_rightmenu_view');?>
<?php $this->load->view('templates/_parts/admin_master_footer_view');?>
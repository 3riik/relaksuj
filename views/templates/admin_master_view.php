<?php defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * @3riik web-design
 */
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    
<?php $this->load->view('templates/_parts/admin_master_header_view'); ?>

<body>    
<div id="stranka">
 
<div class="container">
    <div class="row">
        <div class="hidden-xs col-xs-11">
            <a href="<?= base_url()?>"><img class="img-responsive" alt="Relaksuj" src="<?= base_url()?>assets/img/nove.jpg"/></a>  	
        </div>
    </div>	
</div>
<div class="line"></div>
<!-- xs and mobile navigation -->
<div class="container">
    <div class="row">
        <div class="visible-xs col-xs-12">
            <?php $this->load->view('templates/_parts/admin_master_mobile_navigation_view');?>
        </div>
    </div>
</div>
<!-- Main row -->
<div class="container" >
 <div class="row">
    <div class="col-md-2 menu remove-border hidden-sm hidden-xs">  
        <?php $this->load->view('templates/_parts/admin_master_leftmenu_view')?> 
    </div>
    <div class = "col-xs-12 col-sm-8 col-md-6 top-color basic-container" id="content">
    <?php if($this->session->flashdata('message')){?>
        <span class="message">
        <div class="alert alert-success alert-dismissible" role="alert" >
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="color:black;">&times;</span></button>
          <?php echo $this->session->flashdata('message');?>
		  hehe
        </div>
        </span>
    <?php } ?>
    <?php echo $the_view_content; ?>
    </div>
    <div class = "col-md-3 col-sm-3 hidden-xs menu" >
        <?php $this->load->view('templates/_parts/admin_master_rightmenu_view');?>
    </div>
 </div>
</div>    

<div class="line"></div>
<div id="footer">
    <?php $this->load->view('templates/_parts/admin_master_footer_view');?>
</div>
</div>
<?php echo $before_body;?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?= base_url()?>assets/admin/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $('.dropdown-toggle').dropdown()
</script>
</body>
</html>

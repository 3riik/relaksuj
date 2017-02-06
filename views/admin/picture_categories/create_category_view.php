<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * @3riik web-design
 */
?>
<h1>Vytvoriť kategóriu</h1>
<?php echo $this->session->flashdata('message');?>
<div class="line"></div>
<?php echo form_open('',array('class'=>'form-horizontal'));?>
<div class="form-group">
    <?php echo form_label('Názov kategórie','category_name');?>
    <?php echo form_error('category_name');?>
    <?php echo form_input('category_name','','class="form-control"');?>
</div>
<?php echo form_submit('submit', 'Vytvoriť kategóriu','class="btn btn-primary btn-lg btn-block"');?>
<?php echo form_close();?>


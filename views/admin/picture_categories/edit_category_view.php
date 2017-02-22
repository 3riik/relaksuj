<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * @3riik web-design
 */
?>
<h1>Upraviť kategóriu</h1>
<div class="line"></div>
    <?php echo form_open('',array('class'=>'form-horizontal'));?>
<div class="form-group">
    <?php echo form_label('Názov','category_name',array('class'=>'col-sm-2 control-label'));?>
    <div class="col-sm-9">
    <?php echo form_input('category_name',set_value('category_name',$category['description']),'class="form-control" id="inputCategoryName" placeholder="Názov kategórie"');?>
    <?php echo form_error('category_name','<span class="help-block form-error">','</span>');?>
    </div>
</div>
<?php echo form_submit('submit', 'Upraviť kategóriu', 'class="btn btn-primary btn-lg btn-block"');?>
<?php echo form_close();?>

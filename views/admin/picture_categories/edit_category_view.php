<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * @3riik web-design
 */
?>
<h1>Upraviť kategóriu</h1>
<div class="line"></div>
    <?php echo form_open('',array('class'=>'form-horizontal'));?>
        <div class="form-group">
          <?php echo form_label('Názov','category_name');?>
          <?php echo form_error('category_name');?>
          <?php echo form_input('category_name',set_value('group_name',$category['description']),'class="form-control"');?>
        </div>
        
        <?php echo form_submit('submit', 'Upraviť kategóriu', 'class="btn btn-primary btn-lg btn-block"');?>
      <?php echo form_close();?>

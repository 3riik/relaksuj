<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * @3riik web-design
 */
?>
<h1>Upraviť skupinu</h1>
<div class="line"></div>
    <?php echo form_open('',array('class'=>'form-horizontal'));?>
        <div class="form-group">
          <?php echo form_label('Názov skupiny','group_name');?>
          <?php echo form_error('group_name');?>
          <?php echo form_input('group_name',set_value('group_name',$group->name),'class="form-control"');?>
        </div>
        <div class="form-group">
          <?php echo form_label('Popis skupiny','group_description');?>
          <?php echo form_error('group_description');?>
          <?php echo form_input('group_description',set_value('group_description',$group->description),'class="form-control"');?>
        </div>
        <?php echo form_hidden('group_id',set_value('group_id',$group->id));?>
        <?php echo form_submit('submit', 'Upraviť skupinu', 'class="btn btn-primary btn-lg btn-block"');?>
      <?php echo form_close();?>

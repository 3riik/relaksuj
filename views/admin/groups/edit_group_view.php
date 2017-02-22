<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * @3riik web-design
 */
?>
<h1>Upraviť skupinu</h1>
<div class="line"></div>
<?php echo form_open('',array('class'=>'form-horizontal'));?>
<div class="form-group">
    <?php echo form_label('Názov skupiny','group_name',array('class'=>'col-sm-2 control-label'));?>
    <div class="col-sm-9">
    
    <?php echo form_input('group_name',set_value('group_name',$group->name),'class="form-control" id="inputGroupName" placeholder="Názov skupiny"');?>
    <?php echo form_error('group_name','<span class="help-block form-error">','</span>');?>    
    </div>
</div>

<div class="form-group">
    <?php echo form_label('Popis skupiny','group_description',array('class'=>'col-sm-2 control-label'));?>
    <div class="col-sm-9">
    <?php echo form_input('group_description',set_value('group_description',$group->description),'class="form-control" id="inputGroupDescription" placeholder="Popis skupiny"');?>
    <?php echo form_error('group_description','<span class="help-block form-error">','</span>');?>
    </div>
</div> 

    <?php echo form_hidden('group_id',set_value('group_id',$group->id));?>
    <?php echo form_submit('submit', 'Upraviť skupinu', 'class="btn btn-primary btn-lg btn-block"');?>
  <?php echo form_close();?>

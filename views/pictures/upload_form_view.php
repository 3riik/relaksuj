<?php defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * @3riik web-design
 */ 
foreach($categories as $category):
    $options[$category->id] = $category->name; 
    endforeach;

if($this->ion_auth->logged_in()){
echo form_open('pictures/add',array('class'=>'form-horizontal'));?>
<div class="form-group">
    <?php echo form_label('Nadpis','title',array('class'=>'col-sm-2 control-label')); ?>
    <div class="col-sm-9">
        <?php
        echo form_input('title',set_value('title'),'class="form-control" id="inputTitle" placeholder="Nadpis"');
        echo form_error('title','<span class="help-block form-error">','</span>');
        ?>
    </div>
</div>
<div class="form-group">
    <?php echo form_label('Kategória','category',array('class'=>'col-sm-2 control-label')); ?> 
    <div class="col-sm-9">
        <?php echo form_dropdown('category',$options,$options[1],'class="form-control"');?>
    </div>
</div>
<div class="form-group">
    <?php echo form_label('Popis','description',array('class'=>'col-sm-2 control-label'));?>
    <div class="col-sm-9">
        <?php echo form_textarea('description',set_value('description'),'class="form-control" rows="3" id="inputDescription" placeholder="Popis"'); ?>
    </div>
</div>
<div class="form-group">    
    <label class="custom-file-upload control-label" style="margin-left: 15px;">
        <div id="custom-upload-btn" >Vybrať súbor</div>
        <div style='height: 0px;width: 0px; overflow:hidden;'><input name="userfile" id="upfile" type="file" value="upload" onchange="sub(this)"/></div>
    </label>
</div>
<?php echo form_submit('submit', 'Upload', 'class="btn btn-primary btn-lg btn-block"');?>
<?php echo form_close();?>
    
<script>formError();</script>
<div class="line"></div>           
<?php }
?>





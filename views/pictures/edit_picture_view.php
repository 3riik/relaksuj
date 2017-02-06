<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * @3riik web-design
 */

foreach($categories as $category):
        $options[$category->id] = $category->name; 
        endforeach;
?>
<h1>Upraviť obrázok</h1>
<div class="line"></div>
<?php $this->load->view('pictures/show_picture_view'); ?>
      <?php echo form_open('',array('class'=>'form-horizontal'));?>
        <div class="form-group">
          <?php
          echo form_label('Nadpis','title');
          echo form_error('title');
          echo form_input('title',set_value('title',$picture->title),'class="form-control"');
          ?>
        </div>
        <div class="form-group">
          <?php
          echo form_label('Kategória','category');
          echo form_dropdown('category',$options,$picture->category);
          ?>
        </div>
        <div class="form-group">
          <?php
          echo form_label('Popis','description');
          echo form_error('description');
          echo form_textarea('description',set_value('description',$picture->description),'class="form-control"');
          ?>
        </div>
        <?php echo form_hidden('picture_id',$picture->id);?>
        <?php echo form_submit('submit', 'Upraviť', 'class="btn btn-primary btn-lg btn-block"');?>
      <?php echo form_close();?>

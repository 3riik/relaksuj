<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * @3riik web-design
 */
?>
<h1>Vytvoriť používateľa</h1>
<div class="line"></div>
<?php echo form_open('',array('class'=>'form-horizontal'));?>
<div class="form-group">
  <?php
  echo form_label('Meno','first_name');
  echo form_error('first_name');
  echo form_input('first_name',set_value('first_name'),'class="form-control"');
  ?>
</div>
<div class="form-group">
  <?php
  echo form_label('Priezvisko','last_name');
  echo form_error('last_name');
  echo form_input('last_name',set_value('last_name'),'class="form-control"');
  ?>
</div>
<div class="form-group">
  <?php
  echo form_label('Telefón','phone');
  echo form_error('phone');
  echo form_input('phone',set_value('phone'),'class="form-control"');
  ?>
</div>
<div class="form-group">
  <?php
  echo form_label('Prihlasovacie meno','username');
  echo form_error('username');
  echo form_input('username',set_value('username'),'class="form-control"');
  ?>
</div>
<div class="form-group">
  <?php
  echo form_label('Email','email');
  echo form_error('email');
  echo form_input('email','','class="form-control"');
  ?>
</div>
<div class="form-group">
  <?php
  echo form_label('Heslo','password');
  echo form_error('password');
  echo form_password('password','','class="form-control"');
  ?>
</div>
<div class="form-group">
  <?php
  echo form_label('Potvrdiť heslo','password_confirm');
  echo form_error('password_confirm');
  echo form_password('password_confirm','','class="form-control"');
  ?>
</div>
<div class="form-group">
  <?php
  if(isset($groups))
  {
    echo form_label('Skupiny','groups[]');
    foreach($groups as $group)
    {
      echo '<div class="radio">';
      echo '<label>';
      echo form_radio('groups[]', $group->id, set_checkbox('groups[]', $group->id));
      echo ' '.$group->name;
      echo '</label>';
      echo '</div>';
    }
  }
  ?>
</div>
<?php echo form_submit('submit', 'Vytvoriť používateľa', 'class="btn btn-primary btn-lg btn-block"');?>
<?php echo form_close();?>
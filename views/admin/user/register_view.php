<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * @3riik web-design
 */
?>
      <h1>Registrácia</h1>
      <div class="line"></div>
      <?php echo form_open('',array('class'=>'form-vertical'));?>
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
      <?php
        echo form_error('g-recaptcha-response','<div style="color:red;">','</div>');
      ?>
      <div class="g-recaptcha" data-sitekey="6LfNfA4UAAAAAKJ8md0ILZ4YOJ90QHxMYvec7D4u">
      </div>
      
      <?php echo form_submit('submit', 'Zaregistrovať', 'class="btn btn-primary btn-lg btn-block"');?>
      <?php echo form_close();?>
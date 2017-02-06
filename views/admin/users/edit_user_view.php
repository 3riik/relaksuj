<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * @3riik web-design
 */
?>
<h1>Upraviť používateľa</h1>
<div class="line"></div>
      <?php echo form_open('',array('class'=>'form-horizontal'));?>
        <div class="form-group">
          <?php
          echo form_label('Meno','first_name');
          echo form_error('first_name');
          echo form_input('first_name',set_value('first_name',$user->first_name),'class="form-control"');
          ?>
        </div>
        <div class="form-group">
          <?php
          echo form_label('Priezvisko','last_name');
          echo form_error('last_name');
          echo form_input('last_name',set_value('last_name',$user->last_name),'class="form-control"');
          ?>
        </div>
        <div class="form-group">
          <?php
          echo form_label('Spoločnosť','company');
          echo form_error('company');
          echo form_input('company',set_value('company',$user->company),'class="form-control"');
          ?>
        </div>
        <div class="form-group">
          <?php
          echo form_label('Telefón','phone');
          echo form_error('phone');
          echo form_input('phone',set_value('phone',$user->phone),'class="form-control"');
          ?>
        </div>
        <div class="form-group">
          <?php
          echo form_label('Prihlasovacie meno','username');
          echo form_error('username');
          echo form_input('username',set_value('username',$user->username),'class="form-control"');
          ?>
        </div>
        <div class="form-group">
          <?php
          echo form_label('Email','email');
          echo form_error('email');
          echo form_input('email',set_value('email',$user->email),'class="form-control"');
          ?>
        </div>
        <div class="form-group">
          <?php
          echo form_label('Zmeniť heslo','password');
          echo form_error('password');
          echo form_password('password','','class="form-control"');
          ?>
        </div>
        <div class="form-group">
          <?php
          echo form_label('Potvrdiť nové heslo','password_confirm');
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
              echo form_radio('groups[]', $group->id, set_checkbox('groups[]', $group->id, in_array($group->id,$usergroups)));
              echo ' '.$group->name;
              echo '</label>';
              echo '</div>';
            }
          }
          ?>
        </div>
        <?php echo form_hidden('user_id',$user->id);?>
        <?php echo form_submit('submit', 'Upraviť', 'class="btn btn-primary btn-lg btn-block"');?>
      <?php echo form_close();?>

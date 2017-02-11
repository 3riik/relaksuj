<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * @3riik web-design
 */
?>
      <h1>Registrácia</h1>
      <div class="line"></div>
      <?php echo form_open('',array('class'=>'form-horizontal'));?>
      <div class="form-group">
        <?php
        echo form_label('Meno','first_name',array('class'=>'col-sm-2 control-label'));
        ?>
          <div class="col-sm-9">  
            <?php
            echo form_input('first_name',set_value('first_name'),'class="form-control" id="inputFirstName" placeholder="Meno"');
            echo form_error('first_name','<span class="help-block form-error">','</span>');
            ?>
          </div>
      </div>
      <div class="form-group">
        <?php
        echo form_label('Priezvisko','last_name',array('class'=>'col-sm-2 control-label'));
        ?>
          <div class="col-sm-9">
            <?php
            echo form_input('last_name',set_value('last_name'),'class="form-control" id="inputLastName" placeholder="Priezvisko"');
            echo form_error('last_name','<span class="help-block form-error">','</span>');
            ?>
          </div>
      </div>
      <div class="form-group">
        <?php
        echo form_label('Telefón','phone',array('class'=>'col-sm-2 control-label'));
        ?>
          <div class="col-sm-9">
            <?php
            echo form_input('phone',set_value('phone'),'class="form-control" type="number" id="inputPhone" placeholder="Telefón"');
            echo form_error('phone','<span class="help-block form-error">','</span>');
            ?>
          </div>
      </div>
      
      <div class="form-group">
        <?php
        echo form_label('Login','username',array('class'=>'col-sm-2 control-label'));
        ?>
          <div class="col-sm-9">
            <?php
            echo form_input('username',set_value('username'),
                    'class="form-control" id="inputUsername" placeholder="Prihlasovacie meno"');
            echo form_error('username','<span class="help-block form-error">','</span>');  ?>
          </div>
      </div>
      
      <div class="form-group">
        <?php
        echo form_label('Email','email',array('class'=>'col-sm-2 control-label'));
        ?>
          <div class="col-sm-9">
            <?php
            echo form_input('email','','class="form-control" type="email" id="inputEmail" placeholder="Email"');
            echo form_error('email','<span class="form-error help-block">','</span>');
            ?>
          </div>
      </div>
      <div class="form-group">
        <?php
        echo form_label('Heslo','password',array('class'=>'col-sm-2 control-label'));
        ?>
          <div class="col-sm-9">
          <?php
            echo form_password('password','','class="form-control" type="password" id="inputPassword2" placeholder="Heslo"');
            echo form_error('password','<span class="help-block form-error">','</span>');
        ?>
          </div>
      </div>
      <div class="form-group">
        <?php
        echo form_label('Potvrdiť heslo','password_confirm',array('class'=>'col-sm-2 control-label'));
        ?>
          <div class="col-sm-9">
            <?php
            echo form_password('password_confirm','','class="form-control" type="password" id="inputPasswordConfirm" placeholder="Potvrdiť heslo"');
            echo form_error('password_confirm','<span class="help-block form-error">','</span>');
            ?>
          </div>
      </div>
      <?php
        echo form_error('g-recaptcha-response','<div style="color:red;">','</div>');
      ?>
      <div class="g-recaptcha" data-sitekey="6LfNfA4UAAAAAKJ8md0ILZ4YOJ90QHxMYvec7D4u">
      </div>
      
      <?php echo form_submit('submit', 'Zaregistrovať', 'class="btn btn-primary btn-lg btn-block"');?>
      <?php echo form_close();?>
      <script>formError();</script>
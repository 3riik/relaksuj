<?php

/* 
 * @3riik web-design
 */
?>
<h1>Login</h1>
<div class="line"></div>
<?php echo form_open(base_url().'admin/user/login','','class="form-horizontal"');?>
<div class="form-group">
    <label for="inputName"></label>
    <div class="col-sm-12 ">
        <?php echo form_error('identity');?>
        <?php echo form_input('identity','','class="form-control" placeholder="Meno" type="text" id="inputName"');?>
    </div>
</div>
<div class="form-group">
    <label for="inputPassword"></label>
    <div class="col-sm-12">
        <?php echo form_error('password');?>
        <?php echo form_password('password','','class="form-control" placeholder="Heslo" type="password" id="inputPassword"');?>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-12">
        <div class="checkbox">    
            <label>
                <?php echo form_checkbox('remember','1',FALSE);?> Zapamätať prihlásenie
            </label>
        </div>
    </div>
</div>
<div class="form-group">     
    <div class="col-sm-12">
        <?php echo form_submit('submit','Log in','class="btn btn-primary btn-lg btn-block"');?>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-12">
        <p><a href="<?= site_url('admin/user/register') ?>">Registrácia</a></p>
    </div>
   
</div>
<?php echo form_close();?>

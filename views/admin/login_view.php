<?php

/* 
 * @3riik web-design
 */
?>

    <div class="login_form">
        <h1>Login</h1>
        <div class="line"></div>
        <?php echo form_open(base_url().'admin/user/login');?>
        <div class="form-group">
            
            <?php echo form_error('identity');?>
            <?php echo form_input('identity','','class="form-control" placeholder="Meno"');?>
        </div>
        <div class="form-group">
            
            <?php echo form_error('password');?>
            <?php echo form_password('password','','class="form-control" placeholder="Heslo"');?>
        </div>
        <div class="form-group">
            <label>
                <?php echo form_checkbox('remember','1',FALSE);?> Zapamätať prihlásenie
            </label>
        </div>
        <p><a href="<?= site_url('admin/user/register') ?>">Registrácia</a></p>
        <?php echo form_submit('submit','Log in','class="btn btn-primary btn-lg btn-block btn-top"');?>
        <?php echo form_close();?>
    </div>

<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * @3riik web-design
 */
?>

<h1>Používatelia</h1>
<div class="line"></div>
<a class="btn btn-primary" href="<?php echo site_url('admin/users/create');?>" >Vytvoriť používateľa</a><br><br>
<?php
if (!empty($users))
{
	?>
    <table class="table table-condensed table-hover">
    <thead>
    	<tr>
    		<td>ID</td>
    		<td>Skupina</td>
    		<td>Prihlasovacie meno</td>
    		<td>Celé Meno</td>
    		<td>Posledné prihlásenie</td>
    		<td>Operácie</td>
    	</tr>
    </thead>
    <tbody><?php 
    foreach($users as $user)
    {
        $user_group = $this->ion_auth->get_users_groups($user->id)->result(); ?>
        <tr>
        <td> <?= $user->id?></td>
        <td> <?= $user_group[0]->name?></td>
        <td> <?= $user->username?></td>
        <td> <?= $user->first_name.' '.$user->last_name?></td>
        <td> <?= date('Y-m-d', $user->last_login)?></td>
        <td> <?php 
        if($current_user->id != $user->id){
            echo anchor('admin/users/edit/'.$user->id,'<span class="glyphicon glyphicon-pencil"></span>')
                 .' '.anchor('admin/users/delete/'.$user->id,'<span class="glyphicon glyphicon-remove"></span>');   
        }else {
            echo '&nbsp;';
        }?>
        </td>
        </tr><?php 
    }
    ?></tbody></table><?php  
}

<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * @3riik web-design
 */
?>

<h1>Používatelia</h1>
<div class="line"></div>
<a class="button" href="<?php echo site_url('admin/users/create');?>" >Vytvoriť používateľa</a>
<?php
if (!empty($users))
{
    echo '<table class="users">';
    echo '<tr><td>ID</td><td>Skupina</td><td>Prihlasovacie meno</td><td>Celé Meno</td><td>Posledné prihlásenie</td><td>Operácie</td></tr>';
    foreach($users as $user)
    {
        $user_group = $this->ion_auth->get_users_groups($user->id)->result();
        echo '<tr>';
        echo '<td>'.$user->id.'</td><td>'
                   .$user_group[0]->name.'</td><td>' 
                   .$user->username.'</td><td>'
                   .$user->first_name.' '.$user->last_name.'</td></td><td>'
                   .date('Y-m-d', $user->last_login).'</td><td>';
        if($current_user->id != $user->id){
            echo anchor('admin/users/edit/'.$user->id,'<span class="glyphicon glyphicon-pencil">Upraviť</span>')
                 .' '.anchor('admin/users/delete/'.$user->id,'<span class="glyphicon glyphicon-remove">Vymazať</span>');   
        }else {
            echo '&nbsp;';
        }
        echo '</td>';
        echo '</td>';
    }
    echo '</table>'; 
}

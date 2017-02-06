<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * @3riik web-design
 */
?>
<h1>Profil</h1>
<div class="line"></div>
<table class="profile" >
    <tr>
        <td>Meno </td>
        <td><?= $user->first_name?></td>
    </tr>
    <tr>
        <td>Priezvisko </td>
        <td><?= $user->last_name?></td>
    </tr>
    <tr>
        <td>Spoločnosť </td>
        <td><?= $user->company?></td>
    </tr>
    <tr>
        <td>Telefón </td>
        <td><?= $user->phone?></td>
    </tr>
    <tr>
        <td>Prihlasovacie meno</td>
        <td><?= $user->username?></td>
    </tr>
    <tr>
        <td>Email </td>
        <td><?= $user->email?></td>
    </tr>    
</table>
<p><a href="<?= site_url('admin/user/edit')?>">Zmeniť údaje</a></p> 

        
        
       

<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * @3riik web-design
 */
?>
<h1>Profil</h1>
<table class="table table-hover">
  <tbody>
    <tr>
        <th>Meno </th>
        <td><?= $user->first_name?></td>
    </tr>
    <tr>
        <th>Priezvisko </th>
        <td><?= $user->last_name?></td>
    </tr>
    <tr>
        <th>Spoločnosť </th>
        <td><?= $user->company?></td>
    </tr>
    <tr>
        <th>Telefón </th>
        <td><?= $user->phone?></td>
    </tr>
    <tr>
        <th>Prihlasovacie meno</th>
        <td><?= $user->username?></td>
    </tr>
    <tr>
        <th>Email </th>
        <td><?= $user->email?></td>
    </tr>
  </tbody>    
</table>
<a class="btn btn-primary" href="<?= site_url('admin/user/edit')?>">Zmeniť údaje</a> 

        
        
       

<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * @3riik web-design
 */
?>
<h1>Skupiny</h1>
<div class="line"></div>
<a class="button" href="<?php echo site_url('admin/groups/create');?>">Vytvoriť skupinu</a>


<?php
    if(!empty($groups))
    {
        echo '<table class="groups">';
        echo '<tr><td>ID</td><td>Názov skupiny</td></td><td>Popis skupiny</td><td>Operácie</td></td>';
        foreach($groups as $group)
        {
            echo '<tr>';
          echo '<td>'.$group->id.'</td><td>'.anchor('admin/users/index/'.$group->id,$group->name).'</td><td>'.$group->description.'</td><td>'.anchor('admin/groups/edit/'.$group->id,'<span class="glyphicon glyphicon-pencil">Upraviť</span>');
          if(!in_array($group->name, array('admin','members'))) echo ' '.anchor('admin/groups/delete/'.$group->id,'<span class="glyphicon glyphicon-remove">Vymazať</span>');
          echo '</td>';
          echo '</tr>';
        }
        echo '</table>';
    }
?>


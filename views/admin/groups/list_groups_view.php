<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * @3riik web-design
 */
?>
<h1>Skupiny</h1>
<div class="line"></div>
<a class="btn btn-primary" href="<?php echo site_url('admin/groups/create');?>">Vytvoriť skupinu</a><br><br>

<?php
    if(!empty($groups))
    {
    	?>
        <table class="table table-hover table-condensed">
        <thead>
        <tr>
        	<td>ID</td>
        	<td>Názov skupiny</td>
        	<td>Popis skupiny</td>
        	<td>Operácie</td>
        </tr>
        </thead>
        <tbody>
        <?php 
        foreach($groups as $group)
        {
        	?>
            <tr>
            	<td><?= $group->id?></td>
            	<td><?= anchor('admin/users/index/'.$group->id,$group->name)?></td>
            	<td><?= $group->description ?></td>
            	<td><?= anchor('admin/groups/edit/'.$group->id,'<span class="glyphicon glyphicon-pencil">Upraviť</span>');
          		if(!in_array($group->name, array('admin','members'))) echo ' '.anchor('admin/groups/delete/'.$group->id,'<span class="glyphicon glyphicon-remove">Vymazať</span>');?>
          		</td>
          	</tr>
          <?php 
        }
        ?></tbody></table><?php 
    }
?>


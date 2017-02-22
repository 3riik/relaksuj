<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * @3riik web-design
 */
?>
<h1>Obrázky - kategórie</h1>
<div class="line"></div>
<a class="btn btn-primary" href="<?php echo site_url('admin/categories/create');?>">Vytvoriť kategóriu</a><br><br>
<?php
    if(!empty($categories))
    {?>
        <table class="table table-condensed table-hover">
        <thead>
        	<tr>
        		<td>Názov kategórie</td>
        		<td>Operations</td>
        	</tr>
        <tbody>
        <?php 
        foreach($categories as $category)
        {
        ?>
	        <tr>
	        <td><?= $category->name?></td>
	        <td><?= anchor('admin/categories/edit/'.$category->id,'<span class="glyphicon glyphicon-pencil">Upraviť</span>');
	        	echo ' '.anchor('admin/categories/delete/'.$category->id,'<span class="glyphicon glyphicon-remove">Vymazať</span>');?>
	        </td>
	        </tr><?php
		}?>
        </tbody></table><?php 
    }
?>
<p style="text-color:red;text-decoration: underline;" >Pozor! Vymazaním kategórie vymažete aj všetky obrázky ktoré kategória obsahovala.</p>


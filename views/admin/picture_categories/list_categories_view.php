<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * @3riik web-design
 */
?>
<h1>Obrázky - kategórie</h1>
<div class="line"></div>
<a class="button" href="<?php echo site_url('admin/categories/create');?>">Vytvoriť kategóriu</a>


<?php
    if(!empty($categories))
    {
        echo '<table class="groups">';
        echo '<tr><td>Názov kategórie</td><td>Operations</td></td>';
        foreach($categories as $category)
        {
            echo '<tr>';
          echo '<td>'.$category->name.'</td><td>'.anchor('admin/categories/edit/'.$category->id,'<span class="glyphicon glyphicon-remove">Upraviť</span>');
          echo ' '.anchor('admin/categories/delete/'.$category->id,'<span class="glyphicon glyphicon-remove">Vymazať</span>');
          echo '</td>';
          echo '</tr>';
        }
        echo '</table>';
    }
?>
<p style="text-color:red;text-decoration: underline;" >Pozor! Vymazaním kategórie vymažete aj všetky obrázky ktoré kategória obsahovala.</p>


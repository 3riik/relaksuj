<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * @3riik web-design
 */
?>

    <h1><a href="<?= base_url()?>pictures">Obrázky</a></h1>
    <div class="line"></div>
    <ul>
        <?php 
        foreach ($categories as $category):
		$uri = 'pictures/category/'.$category->name;
        ?>
        <li><a href="<?=site_url($uri)?>" class="<?= substr_compare($uri, uri_string(), 0, strlen($uri)) == 0 ? 'active' : '' ?>"><?= $category->description?></a></li>
        <?php    
        endforeach;
        ?>

    </ul>

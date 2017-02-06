<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * @3riik web-design
 */
?>
<div class="line"></div>

    <h1>Administrácia</h1>
<ul>
<li><a class="<?=uri_string() == ('admin/groups') ? 'active' : '' ?>" href="<?php echo site_url('admin/groups'); ?>">Skupiny</a></li>
<li><a class="<?=uri_string() == ('admin/users') ? 'active' : '' ?>" href="<?php echo site_url('admin/users'); ?>">Používatelia</a></li>
<li><a class="<?=uri_string() == ('admin/categories') ? 'active' : '' ?>" href="<?php echo site_url('admin/categories'); ?>">Kategórie</a></li>
</ul>

<div class="line"></div>
<h1>Spravovanie obsahu</h1>
<ul>
<li><a class="<?=uri_string() == ('pictures/add') ? 'active' : '' ?>"href="<?php echo site_url('pictures/add'); ?>">Pridať obrázok</a></li>
</ul>

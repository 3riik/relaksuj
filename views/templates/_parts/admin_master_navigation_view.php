

<ul class="nav nav-tabs">
 <li role="presentation" class="<?= empty(uri_string()) ? 'active' : ''?>">
	<a href="<?= site_url()?>">Home</a>
 </li>
 <li role="presentation" class="dropdown <?= (strcmp(uri_string(),'pictures') >= 0) ? 'active' : ''?>">
		<a class="dropdown-toggle " href="<?= site_url('pictures/')?>" data-toggle="dropdown"role="button" aria-haspopup="false" aria-expanded="false">
		Obrázky <span class="caret"></span>
		</a>
		     <ul class="dropdown-menu">
				<li class="<?= (strcmp(uri_string(),'pictures') == 0) ? 'active' : ''?>">
					<a href="<?= site_url('pictures/')?>">Všetky obrázky</a>
				</li>
				<li role="separator" class="divider"></li>
				<?php 
				foreach ($categories as $category):
				$uri = 'pictures/category/'.$category->name;
				?>
				<li <?= substr_compare($uri, uri_string(), 0, strlen($uri)) == 0 ? 'class="active"' : '' ?>>
					<a href="<?=site_url($uri)?>"><?= $category->description?></a>
				</li>
				<?php    
				endforeach;
				?>
			 </ul>
 </li>
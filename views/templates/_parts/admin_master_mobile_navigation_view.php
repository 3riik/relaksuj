<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * @3riik web-design
 */
 
?>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
	 <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
        data-target="#login-menu-collapse" aria-expanded="false">
        <span class="sr-only">Menu</span>
        <span class="glyphicon glyphicon-user"></span>
        </button>
		<div class="btn-group navbar-btn">
		<a class="btn btn-primary btn-lg <?= empty(uri_string()) ? 'active' : ''?>" href="<?= base_url()?>">Home</a>
		<a class="btn btn-primary btn-lg <?= (strcmp(uri_string(),'pictures') == 0) ? 'active' : ''?>" href="<?= site_url('pictures/')?>">Obrázky</a>
		<button type="button" class="btn btn-lg btn-primary dropdown-toggle"
		 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
		 </button>
		     <ul class="dropdown-menu">
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
		
		</div>
	 </div>		 
    </div>
    <div class="collapse navbar-collapse" id="login-menu-collapse">
        <?php $this->load->view('templates/_parts/admin_master_rightmenu_view');?>
    </div>
	
	<div class="collapse navbar-collapse" id="category-list">
		
      </div> 
    	
</nav>


     
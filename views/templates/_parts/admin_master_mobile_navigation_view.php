<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * @3riik web-design
 */
?>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
        data-target="#login-menu-collapse" aria-expanded="false">
        <span class="sr-only">Menu</span>
        <span class="glyphicon glyphicon-user"></span>
        </button>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
        data-target="#content-menu-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Menu</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?= base_url()?>">Home</a>
    </div>
    <div class="collapse navbar-collapse" id="login-menu-collapse">
        <?php $this->load->view('templates/_parts/admin_master_rightmenu_view');?>
    </div>
    <div class="collapse navbar-collapse" id="content-menu-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="nav-item"><a href="<?=site_url('pictures')?>">Všetky obrázky</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenu"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Kategórie
                    <span class="caret"></span>	
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenu">
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
        </ul>
    </div>	
</nav>
     
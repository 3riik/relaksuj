<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * 3riik
 */
?>
<!DOCTYPE html>
<!--
@3riik web-design
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="<?= base_url()?>assets/admin/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/style.css"/>
       
    <link rel="shortcut icon" href="<?= base_url()?>assets/favicon.ico"/>
    <link href='//fonts.googleapis.com/css?family=Hanuman' rel='stylesheet'/>
    <title><?php echo $page_title; ?></title>   
    <?php echo $before_head;?>

    <script type="text/javascript">
        
 function sub(obj){
    var file = obj.value;
    var fileName = file.split("\\");
    document.getElementById("yourBtn").innerHTML = fileName[fileName.length-1];
  }
  
</script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<!--[endif]-->

</head>

<body>
    
<div id="stranka">
<div class="container">
 <div class="row">
	<div class="col-xs-12">
    <a href="<?= base_url()?>"><img class="img-responsive" alt="Relaksuj" src="<?= base_url()?>assets/img/nove.jpg"/></a>  
	</div>
 </div>	
</div>
<div class="line"></div>
<nav class="navbar navbar-inverse navbar-fixed-top top-color remove-border">
    <div class="container-fluid">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Menu</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?= base_url()?>pictures">Obrázky</a>
    </div>
    <div class="collapse navbar-collapse top-color" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <?php 
            foreach ($categories as $category):
            $uri = 'pictures/category/'.$category->name;
            ?>
            <li <?= substr_compare($uri, uri_string(), 0, strlen($uri)) == 0 ? 'class = "active"' : '' ?>>
                    <a href="<?=site_url($uri)?>"><?= $category->description?></a>
            </li>
            <?php    
            endforeach;
            ?>
        </ul>
    </div>	
</nav>
 
<div class="container" >
<div class="row">
<div class="col-md-2 menu remove-border hidden-sm hidden-xs">  
 
    <h1><a href="<?= base_url()?>pictures">Obrázky</a></h1>
    <div class="line"></div>
    <ul>
        <?php 
        foreach ($categories as $category):
		$uri = 'pictures/category/'.$category->name;
        ?>
        <li><a href="<?=site_url($uri)?>" <?= substr_compare($uri, uri_string(), 0, strlen($uri)) == 0 ? 'class="active"' : '' ?>><?= $category->description?></a></li>
        <?php    
        endforeach;
        ?>
    </ul>

</div>
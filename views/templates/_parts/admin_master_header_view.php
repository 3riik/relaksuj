<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * 3riik web-design
 */
?>

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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
        
 function sub(obj){
    var file = obj.value;
    var fileName = file.split("\\");
    document.getElementById("custom-upload-btn").innerHTML = fileName[fileName.length-1];
  }
 function formError(){
     var e =$(".form-error").parent();
     e.addClass('has-error');
 }
</script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<!--[endif]-->

</head>
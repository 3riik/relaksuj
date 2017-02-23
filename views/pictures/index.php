<?php defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * @3riik web-design
 */

?>
<script>
$(function () {
$('[data-toggle="tooltip"]').tooltip()})
</script>
<h1>Všetky obrázky
    <span class="label label-primary">
        <button class="btn btn-primary btn-xs" type="button" data-toggle="collapse"
        data-target="#collapseSettings" aria-expanded="false" aria-controls="collapseExample">
            <span class="glyphicon glyphicon-cog"  data-toggle="tooltip" 
            data-placement="right" title="Nastavenia"></span>
        </button>
    </span>
</h1>

<div class="collapse" id= "collapseSettings"> 
    <div class="well well-sm well-primary">   
    <div class="btn-group">
        <button type="button" class="btn btn-xs dropdown-toggle btn-primary" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <?='Na stránke: '.$_SESSION['count']?><span class="caret"></span>        
        </button>
        <ul class="dropdown-menu">
        <li><a href="<?= site_url('pictures/count/5')?>">5</a></li>
        <li><a href="<?= site_url('pictures/count/10')?>">10</a></li>
        <li><a href="<?= site_url('pictures/count/25')?>">25</a></li>
        <li><a href="<?= site_url('pictures/count/50')?>">50</a></li>
        </ul>
    </div> 
    </div>
</div>
<?php $this->load->view('pictures/navigation_view'); ?>
<div class="line"></div>
    
<!--
Výpis z databázy
-->
<?php $this->load->view('pictures/show_pictures_view');?>

<?php $this->load->view('pictures/navigation_view'); ?>

        
        
       
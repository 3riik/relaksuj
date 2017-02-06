<?php defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * @3riik web-design
 */
?>

<div id="count">
    Príspevkov na stránke: 
    <a href="<?= site_url('pictures/count/5')?>">5</a>
    <a href="<?= site_url('pictures/count/10')?>">10</a>
    <a href="<?= site_url('pictures/count/25')?>">25</a>
    <a href="<?= site_url('pictures/count/50')?>">50</a>
    <span style="float: right;">Aktuálne : <?= $_SESSION['count']?></span>
</div>
    <script type="text/javascript">
        $(function() {
            var a = $("#count a:first-child");
            var i = 0;
            var count = <?= $_SESSION['count'] ?>;
            do{
                if ( parseInt( $(a).html() ) === count)
                {
                    $(a).attr("href","#");
                    $(a).attr("style","color:white; cursor: default;");
                }
                a = $(a.next())
                i++;
            }while (i < 4)
        });
    </script>
<div class="pages">
    
    <?php 
    
    if($current_page>1)
        {?>
    <div class="leftarrow"><a href="<?= site_url('pictures/category').'/'.$current_category.'/'.($current_page-1) ?>"><span class="glyphicon glyphicon-arrow-left"></span></a></div>
    <?php
        } else {
            ?>
        <div class="leftarrow"><a href="#"><span class="glyphicon glyphicon-arrow-left"></span></a></div>
            <?php    
        }
        
for($i = 1 ; $i<=$pages_count;$i++){
    if($i == $current_page)
    {
        echo '<div class="current">'.$i.' </div>';
    }else 
    {
        echo '<a href="'.site_url('pictures/category').'/'.$current_category.'/'.$i.'">'.$i.' </a>';
    }
    }

if($current_page<$pages_count)
        {?>
    <div class="rightarrow"><a href="<?= site_url('pictures/category').'/'.$current_category.'/'.($current_page+1) ?>"><span class="glyphicon glyphicon-arrow-right"></span></a></div>
    <?php
        }  else {
            ?><div class="rightarrow"><a href="#"><span class="glyphicon glyphicon-arrow-right"></span></a></div><?php    
        }
        ?>
</div>
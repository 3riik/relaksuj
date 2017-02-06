<?php defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * @3riik web-design
 */
?>
<div class="count">
    Príspevkov na stránke: 
    <a href="<?= site_url('pictures/count/5')?>">5</a>
    <a href="<?= site_url('pictures/count/10')?>">10</a>
    <a href="<?= site_url('pictures/count/25')?>">25</a>
    <a href="<?= site_url('pictures/count/50')?>">50</a>
    <span style="float: right;">Aktuálne : <?= $_SESSION['count']?></span>
</div>
    <script type="text/javascript">
        $(function() {
            var a = $(".count a:first-child");
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

<nav aria-label="Pictures pages" class="text-center">
 <ul class="pagination pagination-lg">
    <?php 
    if($current_page>1)
        {?>
    <li class="page-item remove-border"><a class="page-link" aria-label="Previous" href="<?= site_url('pictures/index').'/'.($current_page-1) ?>"><span class="glyphicon glyphicon-arrow-left"></span></a></li>
    <?php
        } else {
            ?>    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"><span class="glyphicon glyphicon-arrow-left"></span></a></li>

            <?php    
        }
        
for($i = 1 ; $i<=$pages_count;$i++){
    if($i == $current_page)
    {
        echo '<li class="page-item active" ><a class="page-link" href="#">'.$i.' <span class="sr-only">(current)</span></a></li>';
    }else 
    {
        echo '<li class="page-item"><a class="page-link" href="'.site_url('pictures/index/'.$i).'">'.$i.' </a></li>';
    }
    }

if($current_page<$pages_count){
    ?>
            <li class="page-item"><a class="page-link" aria-label="Next" href="<?= site_url('pictures/index/'.($current_page+1)) ?>"><span class="glyphicon glyphicon-arrow-right"></span></a></li>
    <?php
        }else {
            ?><li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"><span class="glyphicon glyphicon-arrow-right"></span></a></li><?php
        }           
        ?>
 </ul>
</nav>


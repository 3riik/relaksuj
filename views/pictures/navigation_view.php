<?php defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * @3riik web-design
 */
?>


<nav aria-label="Pictures pages" class="text-center">
 <ul class="pagination">
    <?php 
    if($current_page>1)
        {?>
    <li class="page-item"><a class="page-link" aria-label="Previous" href="<?= site_url('pictures/index').'/'.($current_page-1) ?>"><span aria-hidden="true">&laquo;</span></a></li>
    <?php
        } else {
            ?>    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"><span aria-hidden="true">&laquo;</span></a></li>

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
            <li class="page-item"><a class="page-link" aria-label="Next" href="<?= site_url('pictures/index/'.($current_page+1)) ?>"><span aria-hidden="true">&raquo;</span></a></li>
    <?php
        }else {
            ?><li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"><span aria-hidden="true">&raquo;</span></a></li><?php
        }           
        ?>
 </ul>
</nav>


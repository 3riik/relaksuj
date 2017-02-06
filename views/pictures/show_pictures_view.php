<?php defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * @3riik web-design
 */
 ?>
 <ul class="clear-list">
    <?php foreach ($pictures as $picture) :
        $author = $this->ion_auth->user($picture->uid)->row();?>
    <li>
        <h2><a href="<?php echo base_url()?>pictures/view/<?= $picture->filename?>"><?= $picture->title ?></a></h2>
            
        <p class="description"><?= $picture->description?></p>
            <span class="time">Pridal: <?= $author->username?> | <?= date("d-m-Y | H:i",strtotime($picture->time)); ?></span>
        <div class="picture"> 
            <?php if($picture->file_ext == '.jpg'){?>
            <a href="<?php echo base_url()?>pictures/view/<?= $picture->filename?>">
                <img src="<?php echo base_url(),'uploads/img/',$picture->filename.'.jpg'?>" alt="<?=$picture->id ?>"/>
            </a>
            <?php }else{ ?>
            <div id="<?= $picture->filename?>"> 
                <img data-state="static" src="<?php echo base_url(),'uploads/img/',$picture->filename.'.jpg'?>"/>
            </div>
            <script type="text/javascript">
            $("#<?= $picture->filename?>").click(function () {    
                if ($(this).find("img").attr("data-state") == "static") {
                $(this).find("img").attr("src", "<?= base_url().'./uploads/img/',$picture->filename,'.gif'?>");
                $(this).find("img").attr("data-state", "dynamic");
                } else {
                $(this).find("img").attr("src", "<?= base_url().'./uploads/img/',$picture->filename,'.jpg'?>");
                $(this).find("img").attr("data-state", "static");
                }
            });
            </script>
            <?php }?>
            <p>Komentárov: <?php echo $this->Pictures_model->get_comments_count($picture->id); ?></p>
            <p class="category">
                <a href="<?php echo site_url('pictures/category/'.$this->Pictures_model->get_categories($picture->category)['name'])?>"><?= $this->Pictures_model->get_categories($picture->category)['description']?>
                </a></p> 
                <div class="line"></div>    
        </div>
    </li>
    <?php endforeach;?>
</ul>
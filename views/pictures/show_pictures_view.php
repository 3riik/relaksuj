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
                <img class="img-rounded" src="<?php echo base_url(),'uploads/img/',$picture->filename.'.jpg'?>" alt="<?=$picture->id ?>"/>
            </a>
            <?php }else{ ?>
            <div class="gif"  id="<?= $picture->filename?>"> 
                <img class="img-rounded gif" data-state="static" src="<?php echo base_url(),'uploads/img/'.$picture->filename.'.jpg'?>"/> 
                <span data-state="static"  class="gif-txt">GIF</span>             
            </div>
			  <script type="text/javascript">
			  $("#<?= $picture->filename?>").click(function () {		  
				  var img = $(this).find('img');
				  var gifTxt = $(this).find('span');
			    if (img.attr("data-state") == "static") {
			      $(img).attr("src", "<?= base_url().'./uploads/img/'.$picture->filename.'.gif'?>");
			      $(img).attr("data-state", "dynamic");
			      $(img).attr("id","<?= $picture->filename?>");
			      $(gifTxt).attr("class","gif-none");
			      $(gifTxt).text('');
			    } else {
			      $(img).attr("src", "<?= base_url().'./uploads/img/'.$picture->filename.'.jpg'?>");
			      $(img).attr("data-state", "static");
			      $(gifTxt).attr("class","gif-txt");
			      $(gifTxt).text('GIF');
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
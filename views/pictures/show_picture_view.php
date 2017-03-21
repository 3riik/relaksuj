<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * @3riik web-design
 */
$author = $this->ion_auth->user($picture->uid)->row();
?>
<h2><?= $picture->title ?></h2>

<p class="description"><?= $picture->description?></p>
    <span class="time">Pridal: <?= $author->username?> | <?= date("d-m-Y | H:i",strtotime($picture->time)); ?></span>

<?php if ($picture->file_ext == '.gif'){ ?>
<div id="gif" class="picture" > 
    <img class="img-rounded gif" data-state="static" src="<?php echo base_url(),'uploads/img/'.$picture->filename.'.jpg'?>"/>
	<span data-state="static"  class="gif-txt">GIF</span>             
</div>
<script type="text/javascript">
  $("#gif").click(function () {    		  
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
<?php } else { ?>

<div class="picture" > 
    <img class="img-rounded" data-state="static" src="<?php echo base_url(),'uploads/img/'.$picture->filename.'.jpg'?>"/>
</div>

<?php }?>
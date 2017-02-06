<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * @3riik web-design
 */
$author = $this->ion_auth->user($picture->uid)->row();
?>
<h2><?= $picture->title ?></h2>

<p class="description"><?= $picture->description?></p>
    <span class="time">Pridal: <?= $author->username?> | <?= date("d-m-Y | H:i",strtotime($picture->time)); ?></span>
<div id="gif" class="picture" > 
    <img data-state="static" src="<?php echo base_url(),'uploads/img/',$picture->filename.'.jpg'?>"/>
</div>
<?php if ($picture->file_ext == '.gif'){ ?>
<script type="text/javascript">
  $("#gif").click(function () {    
    if ($(this).find("img").attr("data-state") == "static") {
      $(this).find("img").attr("src", "<?= base_url().'./uploads/img/',$picture->filename,'.gif'?>");
      $(this).find("img").attr("data-state", "dynamic");
    } else {
      $(this).find("img").attr("src", "<?= base_url().'./uploads/img/',$picture->filename,'.jpg'?>");
      $(this).find("img").attr("data-state", "static");
    }
  });
</script>
<?php }
<?php defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * @3riik web-design
 */


$this->load->view('pictures/show_picture_view'); 
if($delete_button){ ?>
<p class="text-right">
    <a href="<?php echo base_url(),'pictures/delete/',$picture->filename?>"><span class="glyphicon glyphicon-remove"></span></a> | 
    <a href="<?php echo base_url(),'pictures/edit/',$picture->filename?>"><span class="glyphicon glyphicon-pencil"></span></a>
</p>
<?php } 
if(!empty($comments)){?>
	
    <table class="table table-hover">
    <thead>
	    <tr>
	    	<th><h1>Komentáre</h1></th>
	    </tr>
    </thead>
    <tbody>
    <?php 
	foreach($comments as $comment):?>
    <tr>
    	<td><span class="bigger text-info text-capitalize"><?= $this->ion_auth->user($comment->uid)->row()->username?></span>
    		<small class="pull-right"><?= date("d-m-Y | H:i",strtotime($comment->time))?></small><br><?php
    	if($add_comment){
    	if($this->ion_auth->user()->row()->id == $comment->uid || $delete_button)
    	{    
        	echo '<a class="delete_comment " href="'.site_url('pictures/deleteComment/'.$comment->id).'"><span class="glyphicon glyphicon-remove pull-right"></span></a>';
    	}
    	}?>
    	<p class=""><?=$comment->text?></p>
    	</td>
    </tr><?php 
	endforeach;?>
    </tbody></table><?php 
}
if($add_comment){
	echo form_open('pictures/addComment/'.$picture->slug,array('class'=>'form-horizontal'));?>
	<div class="form-group">
		<?= form_label('','comment',array('class'=>'control-label'))?>
		<div class="col-sm-12">
			<?= form_error('comment');?>
			<textarea name="comment" rows="2" class="form-control" id="comment" placeholder="Pridať komentár"></textarea>
		</div>
	</div>
	<?= form_submit('submit','Pridať komentár','class=btn btn-top"')?>
    <?= form_close();}?>

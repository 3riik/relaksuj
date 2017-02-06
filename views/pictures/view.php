<?php defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * @3riik web-design
 */


$this->load->view('pictures/show_picture_view'); 

if($delete_button){ ?>
<p style="text-align:right">
    <a href="<?php echo base_url(),'pictures/delete/',$picture->filename?>">Vymazať</a> | 
    <a href="<?php echo base_url(),'pictures/edit/',$picture->filename?>">Upraviť</a>
</p>
<?php } 
if(!empty($comments)){
    echo '<div class="comments"><h1>Komentáre</h1><div class="line"></div>';
foreach($comments as $comment):
    echo '<div class="comment"><small>'.$comment->time.' napísal '.$this->ion_auth->user($comment->uid)->row()->username.'</small>';
    if($add_comment){
    if($this->ion_auth->user()->row()->id == $comment->uid || $delete_button)
    {    
        echo '<a class="delete_comment" href="'.site_url('pictures/deleteComment/'.$comment->id).'">Vymazať komentár</a>';
    }
    }
    echo '<p class = "bigger">'.$comment->text.'</p>';
    echo '</div>';
endforeach;
    echo '</div>';
}
if($add_comment){
?>
<?php echo form_open('pictures/addComment/'.$picture->slug,array('class'=>'form-inline'));?>

    <?php echo form_label('','comment');?>
    <?php echo form_error('comment');?>
    <?php echo form_textarea('comment','','placeholder = "Pridať komentár"');?>
<?php echo form_submit('submit', 'Pridať komentár','class="btn btn-top"');?>

<?php echo form_close();}?>
    
<?php defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * @3riik web-design
 */ 
    foreach($categories as $category):
        $options[$category->id] = $category->name; 
        endforeach;
     
    if($this->ion_auth->logged_in()){  
    echo validation_errors();
    echo form_open_multipart('pictures/add');
    echo '<p class="text">Nadpis:<br>',form_input('title'),'</p>';
    echo '<p class="text">Kategória:<br>',form_dropdown('category',$options,'sranda'),'</p>';
    echo '<p class="text">Popis:<br>',form_textarea('description'),'</p>';
    
    ?>

    <label class="custom-file-upload">
    <div id="yourBtn" >Vybrať súbor</div>
    <div style='height: 0px;width: 0px; overflow:hidden;'><input name="userfile" id="upfile" type="file" value="upload" onchange="sub(this)"/></div>
    
    </label>
    <input type="submit" value="Upload" />
    </form>
    <div class="line"></div>           
<?php }
?>





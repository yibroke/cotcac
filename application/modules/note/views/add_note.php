<br>
<h1>Add Note</h1>
<?php 
 //noted the .$update_id. Can be empty if insert and can be a number if edit. 
 echo form_open('note/insert_validation/'); 
// If $update_id not empty mean this is the edit form. Create a input text read only or hidden for id
   if(isset($update_id)){?>
<input type="text" readonly="readonly" value="<?php echo $update_id; ?>" name="id" id="id">
   <?php
   }
   ?>


  <div class="form-group">
    <label>Content</label>
    <textarea class="form-control" name="content" id="headline" ><?php echo $content; ?></textarea>
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
 <?php echo form_close(); ?>
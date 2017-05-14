<br>
<h1>Add toy</h1>
<?php 
 //noted the .$update_id. Can be empty if insert and can be a number if edit. 
 echo form_open('toy/insert_validation/'); 
// If $update_id not empty mean this is the edit form. Create a input text read only or hidden for id
   if(isset($update_id)){?>
<input type="text" readonly="readonly" value="<?php echo $update_id; ?>" name="id" id="id">
   <?php
   }
   ?>


  <div class="form-group">
    <label>Name</label>
   <input type="text" class="form-control" name="name"  value="<?php echo $name ; //  empty(insert) or value(edit) ?>">
  </div>
  <div class="form-group" style="max-width: 200px">
    <label>Buy</label>
    <input type="number" min="0" max="100000000" class="form-control" name="buy"  value="<?php echo $buy ; ?>">
  </div>
  <div class="form-group" style="max-width: 200px">
    <label>Sell</label>
    <input type="number" min="0" max="100000000" class="form-control" name="sell"  value="<?php echo $sell ; ?>">
  </div>
  <div class="form-group">
    <label>Note</label>
    <textarea class="form-control" name="note" id="headline" ><?php echo $note; ?></textarea>
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
 <?php echo form_close(); ?>
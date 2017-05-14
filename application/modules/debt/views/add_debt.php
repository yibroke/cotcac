<br>
<h1>Add Debt</h1>
<?php 
 //noted the .$update_id. Can be empty if insert and can be a number if edit. 
 echo form_open('debt/insert_validation/'.$update_id, array('id' => 'form_insert_page', 'role' => 'form')); 
// If $update_id not empty mean this is the edit form. Create a input text read only or hidden for id
   if(isset($update_id)){?>
<input type="text" readonly="readonly" value="<?php echo $update_id; ?>" name="id" id="id">
   <?php
   }
   ?>
  <div class="form-group" style="max-width: 200px">
    <label>Price</label>
    <input type="number" min="0" max="100000000" class="form-control" name="price"  value="<?php echo $price ; //  empty(insert) or value(edit) ?>">
  </div>
  <div class="form-group" style="max-width: 200px">
    <label>Name</label>
    <input type="text" class="form-control" name="name"  value="<?php echo $name ; //  empty(insert) or value(edit) ?>">
  </div>
  <div class="form-group" style="max-width: 200px">
    <label>Owner</label>
    <input type="text" class="form-control" name="owner"  value="<?php echo $owner ; //  empty(insert) or value(edit) ?>">
  </div>
  <div class="form-group" style="max-width: 400px">
    <label>Pay day</label>
    <input type="text" class="form-control" name="pay_day"  value="<?php echo $pay_day ; //  empty(insert) or value(edit) ?>">
  </div>

  <div class="form-group">
    <label>Note</label>
    <textarea class="form-control" name="note" id="headline" ><?php echo $note;  //  empty(insert) or value(edit) ?></textarea>
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
 <?php echo form_close(); ?>
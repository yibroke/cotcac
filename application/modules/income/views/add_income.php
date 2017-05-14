<br>
<h1>Add Income</h1>
<?php 
 //noted the .$update_id. Can be empty if insert and can be a number if edit. 
 echo form_open('income/insert_validation/'.$update_id, array('id' => 'form_insert_page', 'role' => 'form')); 
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
       <select class="form-control" name="type" required="required">
         <option value="">Choose a category</option>
            <?php 
             foreach ($types as $cat) {
                     ?>
                       <option <?php if($cat->id==$type){ echo 'selected="selected"';} ?> value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
                     <?php
                 }
                ?>
            </select>
          </div>
  <div class="form-group">
    <label>Note</label>
    <textarea class="form-control" name="note" id="headline" ><?php echo $note;  //  empty(insert) or value(edit) ?></textarea>
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
 <?php echo form_close(); ?>
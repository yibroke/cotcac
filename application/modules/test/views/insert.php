<h1>Insert</h1>
 <?php echo form_open('test/insert_validation', array('id' => 'form_register', 'role' => 'form')); ?>
   <?php
   if(isset($update_id)){?>
   <input type="text" value="<?php echo $update_id; ?>" name="id" id="id">
   <?php
   }
   ?>
  <div class="form-group">
    <label for="email">Name</label>
    <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
 <?php echo form_close(); ?>
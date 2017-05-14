
<link href="<?php echo base_url(); ?>public/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>public/dist/js/bootstrap-colorpicker.min.js" type="text/javascript"></script>
<div class="example">
    <div class="example-title">As a component</div>
    
    <div class="example-content well">
        <div class="example-content-widget">
      <div id="cp2" class="input-group colorpicker-component">
          <input type="text" value="#00AABB" class="form-control"/>
          <span class="input-group-addon"><i></i></span>
      </div>
      <script>
          $(function () {
              $('#cp2').colorpicker();
          });
      </script>
        </div>
     
  </div>
</div>


      <div id="picker" class="input-group colorpicker-component">
          <input type="text" value="#00AABB" class="form-control"/>
          <span class="input-group-addon"><i></i></span>
      </div>
      <script>
          $(function () {
              $('#picker').colorpicker();
          });
      </script>

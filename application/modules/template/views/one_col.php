<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo base_url(); ?>public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo base_url(); ?>public/include/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>public/include/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo base_url(); ?>public/include/myjs.js" type="text/javascript"></script>
		<!-- COLOR PICKER -->
        <link href="<?php echo base_url(); ?>public/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo base_url(); ?>public/dist/js/bootstrap-colorpicker.min.js" type="text/javascript"></script>
        <!-- END COLOR PICKER -->
         <link rel="icon" type="images/png" sizes="32x32" href="<?php echo base_url(); ?>favicon-32x32.png">
        <title><?php echo $title; ?></title>
        <meta name="description" content="<?php echo $description; ?>">
        <meta name="keywords" content="<?php echo $keyword; ?>">
        <script type="text/javascript">
         //set base_url use with ajax
         var base_url = "<?php echo base_url(); ?>";
         </script>
    </head>
    <body>


            <?php
            $this->load->view($module . '/' . $view_file);
            ?>
<br>
<hr>
<footer class="container-fluid text-center well-lg">
    <br>
    <p class="text-center">©2016 <a href="<?php echo base_url(); ?>">Yibroke.com</a></p>
</footer><!-- end container -->

         <?php
      if ($this->session->userdata('logged_in') != TRUE) {
         echo Modules::run('user/check_cookie');// fire function cookie
        // echo 1;
       }
  ?>
</body>
</html>

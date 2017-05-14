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
         <meta property="og:url" content="<?php echo $link; ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="<?php echo $title; ?>" />
	<meta property="og:description" content="<?php echo $description; ?>" />
	<meta property="og:image" content="<?php echo $meta_img; ?>" />
        <script type="text/javascript">
            //set base_url use with ajax
            var base_url = "<?php echo base_url(); ?>";
        </script>
        <style>

            .form-control{

                max-width: 400px;
            }
            .center_div{
                margin: 0 auto;
                width:80% /* value of your choice which suits your alignment */
            }

        </style>

    </head>
    <body>
         <!-- FACEBOOK CODE -->
    <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1949551201938980',
      xfbml      : true,
      version    : 'v2.7'
    });
  };
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<!-- END FACEBOOK CODE -->
        
        
        
        <?php
        $this->load->view($module . '/' . $view_file);
        ?>
<hr>
      
<div class="text-center">  <p class="text-center"><a href="<?php echo base_url(); ?>">Power By Poll maker</a></p></div>



    </body>
</html>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
        <link href="<?php echo base_url(); ?>public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
         <link href="<?php echo base_url(); ?>public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo base_url(); ?>public/include/jquery-1.9.1.min.js" type="text/javascript"></script>
      
        <script src="<?php echo base_url(); ?>public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
   
        <link href="<?php echo base_url(); ?>public/include/simple-sidebar.css" rel="stylesheet" type="text/css"/>
      
   
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

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                       Yibroke
                    </a>
                </li>
                 <li <?php if($current=='note'){echo 'class="active"';} ?>><a href="<?php echo base_url() ?>note/list-note/id"><i class="fa fa-sticky-note" aria-hidden="true"></i> Note</a></li>
      <li <?php if($current=='income'){echo 'class="active"';} ?>><a href="<?php echo base_url() ?>income/list-income/id"><i class="fa fa-money" aria-hidden="true"></i> Income</a></li>
      
      <?php
       $now = new DateTime('now');
       $month = $now->format('m');
         $year = $now->format('Y');
      ?>
      <li <?php if($current=='spend'){echo 'class="active"';} ?>><a href="<?php echo base_url().'spend/list-spend/'.$month.'/'.$year; ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Spend</a></li>
      <li <?php if($current=='debt'){echo 'class="active"';} ?>><a href="<?php echo base_url(); ?>debt/list-debt"><i class="fa fa-credit-card" aria-hidden="true"></i> Debt</a></li>
      <li <?php if($current=='toy'){echo 'class="active"';} ?>><a href="<?php echo base_url(); ?>toy/list-toy"><i class="fa fa-car" aria-hidden="true"></i> Toy</a></li>
      <li <?php if($current=='mima'){echo 'class="active"';} ?>><a href="<?php echo base_url(); ?>mima/list-mima"><i class="fa fa-key" aria-hidden="true"></i> Mima</a></li>
      <li <?php if($current=='project'){echo 'class="active"';} ?>><a href="<?php echo base_url(); ?>project/list-project"><i class="fa fa-briefcase" aria-hidden="true"></i> Project</a></li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><span class="glyphicon glyphicon-align-justify"></span></a><br>
                       <!-- your page content -->
        <?php
            $this->load->view($module . '/' . $view_file);
            
            ?>
                     
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

  

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>
</html>

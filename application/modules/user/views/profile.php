
<div class="container">
    <br>
    <div class="row">
        <div class="col-md-9">
          
            <ul class="nav nav-tabs ">
                <?php $check = $this->uri->segment(2); ?>
                <li <?php if ($check == 'profile') {
                    echo 'class="active"';
                } ?> ><a href="<?php echo base_url().'user/profile/'.$query->user_id; ?>">Profile</a></li>
                <li  <?php if ($check == 'activity') {
                    echo 'class="active"';
                } ?>><a href="<?php echo base_url().'user/activity/'.$query->user_id; ?>">Polls</a></li>
               

            </ul>
            <br>
            <div class="row">
                <!-- profile image-->
                <div class="col-md-3">
                  
                </div><!-- end col md 3-->
                <div class="col-md-9">
                    <h1><?php  echo $query->user_name; ?></h1>
                    <p>Date join: <?php echo $this->time_ago->convert_time_ago($query->user_date); ?></p>
                    <p>About: about me</p>
                    
                </div><!--end col 9-->
                
            </div><!-- end row-->
            <h1>Message</h1>
            
            
           
            
           
    </div><!--end md 9-->
    <div class="col-md-3">
        <h1>Sponsored</h1>
        
        <img src="http://placehold.it/350x350">
        

    </div><!-- end md 3-->
</div><!--end row-->
 </div><!-- end container-->


<div class="container">
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

<div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div>
<p>  Put the facebook comment here<br>
    Setting:<br>
data-href:  địa chỉ trang web đặt comment<br>
data-numposts:  số comments được hiển thị, mặc định là 10<br>
data-width: chiều rộng ô comment (pixels)</p>
<div class="fb-comments" data-href="<?php echo base_url(); ?>" data-colorscheme="light" data-numposts="5" data-width="500"></div>
    
</div>
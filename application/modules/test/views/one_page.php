

<script>

$(document).ready(function(){
    $(".divs div").each(function(e) {
        if (e != 0)
            $(this).hide();
    });

    $("#next").click(function(){
        if ($(".divs div:visible").next().length != 0)
            $(".divs div:visible").next().show().prev().hide();
        else {
            $(".divs div:visible").hide();
            $(".divs div:first").show();
        }
        return false;
    });

    $("#prev").click(function(){
        if ($(".divs div:visible").prev().length != 0)
            $(".divs div:visible").prev().show().next().hide();
        else {
            $(".divs div:visible").hide();
            $(".divs div:last").show();
        }
        return false;
    });
});
</script>
<div class="container">
<div class="divs">
     <div class="cls1">1</div>
     <div class="cls2">2</div>
     <div class="cls3">3</div>
     <div class="cls4">4</div>
     
</div>
    
    <ul class="pager">
  <li> <a id="next">next</a></li>
  <li> <a id="prev">prev</a></li>
</ul>


</div>
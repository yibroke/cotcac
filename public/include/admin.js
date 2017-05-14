$(document).ready(function () {
  $('.question-order input').on('click',function(){
      console.log($( "input:checked" ).val() + " is checked!");
      
      var order_by=$( "input:checked" ).val();
        window.location.href = base_url+'question/list_question/'+order_by;

     
      
  });//end question order
    
});//end ready
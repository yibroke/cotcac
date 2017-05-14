
$(document).ready(function () {


    
    //MODAL ABOVE OPEN EVEN
    $('#myModal').on('shown.bs.modal', function () {
       // var question_texa_area=$('#f1').val();
       //  tinyMCE.activeEditor.setContent(question_texa_area);
       console.log('modal open');
});


  

   

  
    
 //begin register
    $('#form_register').submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: base_url + 'user/register_validation',
            type: 'post',
            data: {
                email: $('#email').val(),
                name: $('#name').val(),
                password: $('#password').val(),
                confirm_password: $('#confirm_password').val()
            },
            beforeSend: function () {
                        $('#load').show();
                         $('#myerror').hide();
                    },
                   complete: function ( ) {
                          $('#load').hide();
                           $('#myerror').show();
                        
                  },
                   error: function () {
                         $('#myerror').html('This is not work!');
                    },
            success: function (data) {
                var jsonData=JSON.parse(data);
                if (jsonData.success === true)
                {
                    
                     $('#myerror').html(jsonData.data);
                     $('#form_register').hide();
                }
                else
                {
                    $('#myerror').html(jsonData.data);
                }
            }

        });//end ajax login
    });//end form login
 //begin email form
    $('#email_form').submit(function (event) {
        event.preventDefault();
        $('#myerror').html('');
        $.ajax({
            url: base_url + 'user/email_validation',
            type: 'post',
            data: {
                email: $('#email').val()
            },
            beforeSend: function () {
                        $('#load').show();
                        $('#myerror').hide();
                    },
                   complete: function ( ) {
                          $('#load').hide();
                           $('#myerror').show();
                         
                  },
                   error: function () {
                         $('#myerror').html('This is not work!');
                    },
                success: function (data) {
                var jsonData=JSON.parse(data);
                if (jsonData.success === true)
                {
                   
                   $('#myerror').html(jsonData.data);
                   $('#email_form').hide();
                }
                else
                {
                    $('#myerror').html(jsonData.data);
                }

            }

        });//end ajax login
    });//end form
 //begin reset password form
    $('#form_reset_password').submit(function (event) {
        event.preventDefault();
        $('#myerror').html('');
        $.ajax({
            url: base_url + 'user/reset_password_validation',
            type: 'post',
            data: {
                password: $('#password').val(),
                confirm_password:$('#confirm_password').val(),
                reset_key:$('#reset_key').val()
            },
            beforeSend: function () {
                        $('#load').show();
                        $('#myerror').hide();
                    },
                   complete: function ( ) {
                          $('#load').hide();
                          $('#myerror').show();
                  },
                   error: function () {
                         $('#myerror').html('This is not work!');
                    },
                success: function (data) {
                var jsonData=JSON.parse(data);
                if (jsonData.success === true)
                {
                    alert(jsonData.data)
                   $('#form_reset_password')[0].reset();
                   $('#form_reset_password').hide();
                     window.location.href = base_url+'user/login';
                }
                else
                {
                    $('#myerror').append(jsonData.data).show('slow');
                }

            }

        });//end ajax login
    });//end form
    
    
    //copy from poll
    // change setting

    $('#comment').change(function () {
        var f1 = $("select option:selected").val();
        console.log(f1);
        $("#f2").val(f1);
    });

//Setting checkbox
    $('.setting-check').click(function () {
        if ($(this).prop("checked") == true) {
            //alert($(this).attr('name'));
            console.log($(this).attr('name'));



            if ($(this).attr('name') === 's_v')//multitple votes
            {
                $("#f3").val(1);
                //change radio to check box
                $('#pre-answer').find('input:radio').prop({type: "checkbox"});
                $('#pre-answer>.radio').removeClass('radio').addClass('checkbox');
            }
            if ($(this).attr('name') === 's_a')//multiple answers 
            {
                $("#f4").val(1);
            }
            if ($(this).attr('name') === 's_h')//hide
            {
                $("#f5").val(1);
                $('#btn_result').hide();
            }
            if ($(this).attr('name') === 'check_random')//hide
            {
                $("#f6").val(1);
               
            }
            if ($(this).attr('name') === 'check_public')//hide
            {
                $("#f7").val(1);
            }

        } else if ($(this).prop("checked") == false) {
            if ($(this).attr('name') === 's_v')
            {
                $("#f3").val(0);
                $('#pre-answer').find('input:checkbox').prop({type: "radio"});
                $('#pre-answer>.checkbox').removeClass('checkbox').addClass('radio');
            }
            if ($(this).attr('name') === 's_a')
            {
                $("#f4").val(0);
            }
            if ($(this).attr('name') === 's_h')
            {
                $("#f5").val(0);
                $('#btn_result').show();
            }
             if ($(this).attr('name') === 'check_random')//hide
            {
                $("#f6").val(0);
               
            }
              if ($(this).attr('name') === 'check_public')//hide
            {
                $("#f7").val(0);
            }

        }
    });
//FUNCTION CHANGE THEME
function theme_poll(theme_color, text_color, btn_bg_color, btn_text_color){
    // THEME BACKGROUND COLOR.
    $('.col-md-5').css("background-color", theme_color);
    $('#c1').val(theme_color);// change the form theme value
    $('#bg_picker').colorpicker('setValue',theme_color);//color picker color

    //TEXT COLOR
    $('.col-md-5').css("color", text_color);
    $('#c2').val(text_color);// change the form theme value
    $('#txt_picker').colorpicker('setValue',text_color); 

    //BUTTON BACKGROUND COLOR
    $('.col-md-5 button').css("background-color", btn_bg_color);
    $('#c3').val(btn_bg_color);// change the form theme value
    $('#btn_picker').colorpicker('setValue',btn_bg_color);

    //BUTTON TEXT COLOR
    $('.col-md-5 button').css("color", btn_text_color);
    $('#c4').val(btn_text_color);// change the form theme value
      $('#btn_txt_picker').colorpicker('setValue',btn_text_color);

     
}

// change theme
    $('#container_default_theme a').click(function (e) {
        e.preventDefault();

        //hide and show content
        var id = $(this).attr('data-related');
        console.log(id);
        if (id === 'default')
        {
            theme_poll('#ffffff', '#000000', '#006102', '#ffffff');

        }
        if (id === 'red')
        {
            theme_poll('#950202', '#ffffff', '#006102', '#ffffff');

        }
        if (id === 'dark')
        {
             theme_poll('#000000', '#ffffff', '#006102', '#ffffff');

        }
        if (id === 'green')
        {
             theme_poll('#0a6002', '#ffffff', '#1b1b1b', '#ffffff');
        }
        if (id === 'blue')
        {
             theme_poll('#0603a3', '#ffffff', '#1b1b1b', '#ffffff');

        }
        if (id === 'grey')
        {
             theme_poll('#5c5c5c', '#ffffff', '#1b1b1b', '#ffffff');

        }

    });
// form submit
    $('#form_vote').submit(function (e) {
     
        e.preventDefault();
        //validate form

        //check exit checkbox
                
        if (($('.checkbox').length) > 0)
        {
          
            var count = $("[type='checkbox']:checked").length;
            if (count < 1)
            {
                console.log('count:'+count);
                alert('You must check at least 1 option');
                return;
            }
            var answers = '' + $("#pre-answer input:checkbox:checked").map(function () {
            return $(this).val();
        }).get(); // <----
        }else{
            answers=$('.optradio:checked').val();  
        }
      


        $.ajax({
            url: base_url + 'vote/vote_validation',
            type: 'POST',
            data: {
                custome_answer: $('#custome_answer').val(),
                user_id: $('#vote_user_id').val(),
                q_id: $('#q_id').val(),
                v_pc: $('#v_pc').val(),
                optradio: answers
            },
            success: function (data)
            {
                var jsonData = JSON.parse(data);
                console.log(jsonData);
                if (jsonData.success === true) {
                    window.location.href = jsonData.data;
                    // $('#myerror1').html(jsonData.data);
                } else {
                    $('#myerror').html(jsonData.data);
                }
            }
        });// end ajax

    });
//nav tag
// form submit
    $('#form_question1').submit(function (e) {
        e.preventDefault();
        //validate form
        $.ajax({
            url: base_url + 'question_validation',
            type: 'POST',
            data: {
                f1: $('#f1').val(),
                count: $('#count').val()
            },
            success: function (data)
            {
                var jsonData = JSON.parse(data);
                console.log(jsonData);
                if (jsonData.success === true) {
                    window.location.href = jsonData.data;
                    // $('#myerror1').html(jsonData.data);
                } else {
                    $('#myerror1').html(jsonData.data);
                }
            }
        });// end ajax

    });
//nav tag
    $('#home-tags .nav-tabs li a').on('click', function (e) {
        e.preventDefault();
        $('.nav-tabs>li').removeClass();
        $(this).parent().addClass('active');
        //hide and show content
        var id = $(this).attr('data-related');
        console.log(id);
        // print li length. Coz something wrong after tag change.


        var li_id = $('.question').length;
        console.log('we have:' + li_id);



        //end test print li length
        $('.mytag').each(function () {
            $(this).hide();
            if ($(this).attr('id') === id) {
                $(this).show();
            }
        });
    });
    //live preview question
    $('#f1').keyup(function () {
        console.log('f1 key up');
        $('#your-question').html($(this).val());
    });//end question


    $("#aaaa").on("focus", ":text", function () {
        var id = $(this).attr('id');
        console.log('focus text box: Id:' + id);
        $('#' + id).keyup(function () {
            $('#r' + id).html($('#' + id).val());
        });// end answer keyup
    });
    $(":text").keyup(function () {
        // how many answer are there
        var answer = $('.question').length;
        // what input text are typing.

    });// end text keyup

    //sortable list
    $('.list-group-sortable').sortable({
        update: function (event, ui) {
            // change the id according to the sort.
            $('.question').each(function (index) {
                $(this).attr('id', 'a' + index);
                $(this).find('.form-control').attr('id', 'i' + index);
                $(this).find('.form-control').attr('name', 'i' + index);
            });
            console.log('fire refresh review');
            $('.preview').each(function (index) {
                $(this).html($('#a' + index + ' input[type=text').val());
            });
        }
    });
    
    // separatly to showcase issue without reload
    $('.js-add-item-button').on('click', function () {
        //caculate the next id: 1. Get the grestest id currently.
        var li_id = $('.question').length;
        console.log(li_id);
        // change number of 

        $('#count').val(li_id);
        // console.log(current_id);          
        $("#aaaa").append(' <li id="a' + li_id + '" class="list-group-item question">  <a href="#" class="glyphicon text-muted glyphicon-move"></a><input name="i' + li_id + '" id="i' + li_id + '" type="text" name="mytext[]" class="form-control answer" placeholder="Type your answer here"></div><a href="#" class="remove_field glyphicon text-danger glyphicon-remove"></a> </li>');
        $('#aaaa').sortable();
        console.log('Fire add item!');
        //if q_f3=1 appen the check box
        console.log($('#f3').val());
        if($('#f3').val()==='1'){
            console.log(1);
              $('#pre-answer').append('<div id="remove' + li_id + '" class="pre-opt checkbox"> <label><input type="checkbox" name="optradio"> <div class="preview" id="ri' + li_id + '">Untitle</div></label></div>');
        }else{
            console.log(0);
              $('#pre-answer').append('<div id="remove' + li_id + '" class="pre-opt radio"> <label><input type="radio" name="optradio"> <div class="preview" id="ri' + li_id + '">Untitle</div></label></div>');
        }
        
        
      
    });
    //end copy from poll
    //Remove field
  $(document).on('click','.remove_field',function(e){
       var li_id = $('.question').length-1;
        console.log('remove call');
          e.preventDefault();
        $('#a'+li_id).remove();
        $('#remove'+li_id).remove();
          $('#count').val($('.question').length-1);
        console.log(li_id);
       
    });//end
      
});//end ready




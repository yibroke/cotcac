$(document).ready(function () {
    $('#form_chat').submit(function (event) {
        event.preventDefault();


        $.ajax({
            url: base_url + 'demo/chat_validation',
            type: 'post',
            data: {
                message: $('#message').val()

            },
            success: function (data) {
                $('#error').html(data);
                $('#form_chat')[0].reset();
            }

        });//end ajax comment

    });//end form comment topic 

    //au to refresh 
    window.setInterval(function () {
        //get lastest id;
        if (check_id() > chat_id)
        {
            refresh_chat();
            chat_id = chat_id + 1;
            console.log('chat_id' + chat_id);
            console.log('check_id' + check_id());
        }
        else
        {

        }


    }, 3000);
    function refresh_chat()
    {
        $('#chat').load(base_url + 'demo/get_chat_message/' + chat_id); // load chat logs


    }
    function check_id()
    {
        $.ajax({
            type: 'post',
            url: base_url + 'demo/last_insert_id',
            success: function (data) {
                result = data;
            }

        });
        return result;
    }
    function call()
    {
        console.log(1);
    }


});//end ready
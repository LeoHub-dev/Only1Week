var base_url = window.location.protocol + "//" + window.location.host + "/";

(function ($) {

    var elem = document.getElementById('messageBox');
    elem.scrollTop = elem.scrollHeight;


	$('#chat_form').on('submit', function(e){
        e.preventDefault();
        e.stopImmediatePropagation();

        var form = $(this);

        $.post($(this).attr('action'), $(this).serialize(), function(data) {
            console.log(data);
            if(data.response == true){ reloadChat(); form.trigger('reset'); }
            if(data.response == false){ alert(data.errors); form.trigger('reset'); }

            
            
            
        },'json').fail(function(xhr, status, error) {
            console.log(error);
            console.log(xhr.responseText);
            console.log(status);
        });

    })


})(jQuery);

var elem = document.getElementById('messageBox');
elem.scrollTop = elem.scrollHeight;

window.setInterval(function(){
    reloadChat();
}, 8000);

function reloadChat()
{
    console.log('reload');
    var n_messages = $('#messageBox').children().length - 1;
    var goDown = 0;
    $.post(base_url+'chat/chatlog', function(data) {


        $.each(data, function(i){
            if(i < n_messages){ 
                return true; 
            } 
            else
            {
                if(data[i].username == $('#h4username').html())
                {
                    $('#messageBox').append('<li>\
                      <div class="message">'+data[i].message+'</div>\
                      <div class="info">\
                        <div class="datetime">'+data[i].datetime+'</div>\
                        <div class="status">'+data[i].username+'</div>\
                      </div>\
                    </li>');
                }
                else
                {
                    $('#messageBox').append('<li class="right">\
                      <div class="message">'+data[i].message+'</div>\
                      <div class="info">\
                        <div class="datetime">'+data[i].datetime+'</div>\
                        <div class="status">'+data[i].username+'</div>\
                      </div>\
                    </li>');
                }
                goDown = 1;
            }

            
            
        })

        if(goDown == 1)
        {
            var elem = document.getElementById('messageBox');
            elem.scrollTop = elem.scrollHeight;
            goDown = 0;
        }


        

    }, 'json').fail(function(xhr, status, error) {
        console.log(error);
        console.log(xhr.responseText);
        console.log(status);
    });
    
}
var checkconfirm = true;
window.onbeforeunload = confirmExit;
function confirmExit()
{
    if (checkconfirm)   
	   return "Nếu bạn thoát ra thì kết quả sẽ là 0 đó nha!";
}

//============================ START CHECK ANSWER 
//============================================================================
var done = false;

$(document).ready(function(){
    
    $tm = $('#tm').val();
    $('#time_box').fadeIn('slow');
    $('#counter').tgcCountdown({
       counter: '[M]:[S]',
       counter_warning: '[M]:[S]',
       counter_expired: '<b>Hết thời gian</b>'
   });
   
   $("#quiz_done").click(function(){
    checkconfirm = false;
    return confirm('Chắc ko?');
   
   })
   
});

function call_back()
{   checkconfirm = false;
    $("#answer_form").submit();
}

var send = setInterval("send_answer()", 60000);

function send_answer()
{
    $.ajax({
            type: "POST",
            url: site_url,
            data: "model=quiz&action=update_result&" + $("#answer_form").serialize(),
            dataType: 'json',
            success: function(msg){
                
            },
            error: function(msg){
                //alert(msg);
            }
    }); 
}

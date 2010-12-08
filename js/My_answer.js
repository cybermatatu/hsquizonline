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
    $('#time_box').slideDown('slow');
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


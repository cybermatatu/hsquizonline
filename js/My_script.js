$(document).ready(function(){
    
/*============================ KHOI TAO CAC FUNC CAN BAN
============================================================================= */
    
    $("#setting").tabs();
    //buttons
    $(".button-add").button({ icons: { primary: "ui-icon-circle-plus" } });
    $(".button-accept").button({ icons: { primary: "ui-icon-circle-check" } });
    
/*============================ SUMIT USER REGISTER
============================================================================= */
    $("#show_signup_form").click(function () {
        $("#signup_form").slideToggle("fast");
    });
    
    $("#register-form").submit(function () { return register(); });
    

/*============================ START CREATE QUIZ 
============================================================================= */

var q_num = 1 , q_order = 1; //question number và answer number = 1

    // ADD QUESTION  
    $(".add_question").live('click', function(event){  
        q_num = $(".add_question").eq(0).attr('q_num');
        q_order = $(".add_question").eq(0).attr('q_order');
        q_type =  $(this).attr('q_type');
        //alert(q_num);
        switch (q_type) {
            case "1":
                question = '<div class="question_box" id="q_box_'+q_num+'"><h2>Câu hỏi <span class="q_num">'+q_order+'</span> - <em><b>Chọn 1 đáp án</b></em><span class="question_delete" q_num="'+q_num+'">&nbsp;</span></h2><div class="question_list"><b>Câu hỏi:</b><br /><textarea name="question_title[]" style="width: 98%; height: 50px">Nội dung câu hỏi</textarea><input type="hidden" name="question_order[]" value="'+q_num+'" /><input type="hidden" name="question_type[]" id="q_type_'+q_num+'" value="'+q_type+'" /></div><div class="answer_list"><b>Trả lời:</b><br /><ul id="answer_root_'+q_num+'"><li id="answer_'+q_num+'_1"><input type="text" class="text" name="answer_'+q_num+'_title[]"  /> <input type="radio" class="check" checked="checked" name="answer_'+q_num+'_check[]" value="1"/> <span style="margin-left: 10px;">&nbsp; &nbsp; &nbsp;</span> </li></ul><br class="clear" /><span style="float: right;"><a class="add_answer_radio" q_num="'+q_num+'" total="1" order="1">Thêm câu trả lời</a></span></div></div>';
                break;
            case "2":
                question = '<div class="question_box" id="q_box_'+q_num+'"><h2>Câu hỏi <span class="q_num">'+q_order+'</span> - <em><b>Chọn nhiều đáp án</b></em><span class="question_delete" q_num="'+q_num+'">&nbsp;</span></h2><div class="question_list"><b>Câu hỏi:</b><br /><textarea name="question_title[]" style="width: 98%; height: 50px">Nội dung câu hỏi</textarea><input type="hidden" name="question_order[]" value="'+q_num+'" /><input type="hidden" name="question_type[]" id="q_type_'+q_num+'" value="'+q_type+'" /></div><div class="answer_list"><b>Trả lời:</b><br /><ul id="answer_root_'+q_num+'"><li id="answer_'+q_num+'_1"><input type="text" class="text" name="answer_'+q_num+'_title[]"  /> <input type="checkbox" class="check" checked="checked" name="answer_'+q_num+'_check[]" value="1"/> <span style="margin-left: 10px;">&nbsp; &nbsp; &nbsp;</span> </li></ul><br class="clear" /><span style="float: right;"><a class="add_answer_radio" q_num="'+q_num+'" total="1" order="1">Thêm câu trả lời</a></span></div></div>';
                break;
            case "3":
                question = '<div class="question_box" id="q_box_'+q_num+'"><h2>Câu hỏi <span class="q_num">'+q_order+'</span> - <em><b>Đúng / Sai</b></em><span class="question_delete" q_num="'+q_num+'">&nbsp;</span></h2><div class="question_list"><b>Câu hỏi:</b><br /><textarea name="question_title[]" style="width: 98%; height: 50px">Nội dung câu hỏi</textarea><input type="hidden" name="question_order[]" value="'+q_num+'" /><input type="hidden" name="question_type[]" id="q_type_'+q_num+'" value="'+q_type+'" /></div><div class="answer_list"><b>Trả lời:</b><br /><ul id="answer_root_'+q_num+'"><li id="answer_'+q_num+'_1"><input type="text" class="text" name="answer_'+q_num+'_title[]" value="Đúng"  /> <input type="radio" class="check" checked="checked" name="answer_'+q_num+'_check[]" value="1"/> <span style="margin-left: 10px;">&nbsp; &nbsp; &nbsp;</span> </li> <li id="answer_'+q_num+'_1"><input type="text" class="text" name="answer_'+q_num+'_title[]" value="Sai"  /> <input type="radio" class="check" name="answer_'+q_num+'_check[]" value="2"/> <span style="margin-left: 10px;">&nbsp; &nbsp; &nbsp;</span> </li></ul><br class="clear" /></div></div>';
                break;
            case "4":
                question = '<div class="question_box" id="q_box_'+q_num+'"><h2>Câu hỏi <span class="q_num">'+q_order+'</span> - <em><b>Tự luận</b></em><span class="question_delete" q_num="'+q_num+'">&nbsp;</span></h2><div class="question_list"><b>Câu hỏi:</b><br /><textarea name="question_title[]" style="width: 98%; height: 50px">Nội dung câu hỏi</textarea><input type="hidden" name="question_order[]" value="'+q_num+'" /><input type="hidden" name="question_type[]" id="q_type_'+q_num+'" value="'+q_type+'" /></div><div class="answer_list"><b>Trả lời:</b><br /><textarea class="textarea" name="answer_'+q_num+'_title[]" style="width: 98%; height: 100px"/></div></div>';
                break;
        }

        $('#question-root').append(question);
        
        $("#total").attr('value', q_order);
        
        q_num++; q_order++;
        
        $(".add_question").eq(0).attr('q_num', q_num);
        $(".add_question").eq(0).attr('q_order', q_order);
        
        return false;
    })
    
    // DELETE QUESTION
    $('.question_delete').live('click', function(event){
        q_num = $(this).attr('q_num');
        
        $("#q_box_"+q_num).remove();

        var root = $('#question-root').find('span.q_num');
           
        root.each(function(index, value){ 
            $(this).text(index+1); 
        });
        $(".add_question").eq(0).attr('q_order', (root.length+1));
        $("#total").attr('value', (root.length));
    });
    
    // ADD ANSWER
    $('.add_answer_radio').live('click', function(event){ 
        q_num = $(this).attr('q_num');
        order = $(this).attr('order'); order++;
        total = $(this).attr('total'); total++;
        q_type = $('#q_type_'+q_num).attr('value');
        
        switch (q_type) {
            case "1":
                answer = '<li id="answer_'+q_num+'_'+order+'"><input type="text" class="text" name="answer_'+q_num+'_title[]" /> <input type="radio" class="check" name="answer_'+q_num+'_check[]" value="'+total+'"/> <span class="answer_radio_delete" q_num="'+q_num+'" order="'+order+'">&nbsp; &nbsp; &nbsp;</span></li>';
                break;
            case "2":
                answer = '<li id="answer_'+q_num+'_'+order+'"><input type="text" class="text" name="answer_'+q_num+'_title[]" /> <input type="checkbox" class="check" name="answer_'+q_num+'_check[]" value="'+total+'"/> <span class="answer_radio_delete" q_num="'+q_num+'" order="'+order+'">&nbsp; &nbsp; &nbsp;</span></li>';
                break;
        }
        
        
        $("#answer_root_" + q_num).append(answer);
        $(this).attr('total', total); 
        $(this).attr('order', order);                               
        //focus
        //$(this).parents().eq(1).prev().find('input[type=text]').focus();  
          
    })
    
    // DELETE ANSWER
    $('.answer_radio_delete').live('click', function(event){
        q_num = $(this).attr('q_num');
        order = $(this).attr('order');
        total = $(this).attr('total');
        
        $("#answer_"+q_num+"_"+order).remove();
        //xoa node
        
        var root = $('#answer_root_'+q_num).find('input.check');
        var total = $('#answer_root_'+q_num).parent().find('.add_answer_radio')
       
        //set lai order cua cac cau answer    
        root.each(function(index, value){ 
            //li_root.eq(index).attr('id', 'answer_'+q_num+'_'+(index+1));
            $(this).attr('value',(index+1)); 
        });
        total.attr('total', root.length);
    });

    
    // CREATE QUIZ
    $("#create_quiz").click(function(){
        var error = '';
        if ($("#quiz_title").val() == '')
            error += "Bạn chưa nhập tiêu đề bài thi.\n";
        if ($("#quiz_info").val() == '')
            error += "Bạn chưa nhập mô tả.\n";
        if ($("#total").val() == 0)
            error += "Bạn chưa tạo câu hỏi.\n";
        if ($("#st_time").val() < 0)
            error += "Thời gian không được âm.";
        if ($("#st_status").attr('checked'))
        {
            var date_start = $("#st_day_start").val() + $("#st_time_start").val();
            var date_end = $("#st_day_end").val() + $("#st_time_end").val();
            
            if (date_start == '' || date_end == '')
            {
                error += "Bạn chưa nhập ngày bắt đầu hoặc kết thúc";    
            }
            else
            {
                //alert(date_start + ' ' + date_end);
                if (date_start > date_end)
                    error += "Ngày giờ bắt đầu phải trước ngày giờ kết thúc";
            }
        }
            
        if (error != '') 
        {
             alert(error);
             return false;
        }
    });
    
    // CHANGE SETTING
    $("#st_status").click(function(){
        $("#st_status_box").slideDown('fast');
        $("#st_day_start, #st_day_end").datepicker(); 
        $("#st_time_start, #st_time_end").timePicker();    
    });
    $(".st_status").click(function(){
        $("#st_status_box").slideUp('fast');    
    });
    $('#st_pass_Y').click(function(){
        $('#st_pass').show();
        $('#st_pass').attr('value', 'Nhập mật khẩu');
    });
    $('#st_pass_N').click(function(){
        $('#st_pass').hide();
        $('#st_pass').attr('value', '');
    });
    $('#st_time_Y').click(function(){
        $('#st_time').show();
    });
    $('#st_time_N').click(function(){
        $('#st_time').hide();
        $('#st_time').attr('value', 0);
    });
    
    
   
//============================ END CREATE QUIZ =====================================



//============================ START USERS 
//===========================================================================

    $('#login_form').submit(function() {
        if ($('#login_username').val() == '' || $('#login_password').val() == '') {
            $('#login_error').html('Vui lòng điền thông tin đăng nhập.').slideDown('fast');
        } else {
            
            $.ajax({
                    type: "POST",
                    url: site_url,
                    data: "model=users&action=login&"+$("#login_username, #login_password").serialize(),
                    dataType: 'json',
                    success: function(msg){
                        if(msg.response == 'error'){
                            $('#login_error').html(msg.message).slideDown('fast');
                        } else {
                            window.location = site_url;
                        }                           
                    },
                    error: function(msg){
                        alert(msg);
                    }
            });
        }
        return false;
    })

//============================ END USERS =====================================


/**
* Search Script
**/
    $("#search-form").submit(function(){
        //Get text
        var text = $("#search-text").val();
        
        //Check text length
        if (text.length < 1)
        {
            $("#search-result").hide().html("<span class='red'>Vui lòng nhập nội dung cần tìm kiếm.</span>").slideDown('slow');
            return false;    
        }
            
            
        //Call ajax search 
        $.ajax({
                type: "POST",
                url: site_url,
                data: "model=quiz&action=search&"+$("#search-form").serialize(),
                dataType: 'json',
                success: function(msg){
                    
                    if (msg['data'].length > 0)
                    {
                        var html = '<ul class="home-list"><li class="home-list-first">'
                                 + '<span class="span-9">Tên đề thi</span><span class="span-4">Người tạo</span>'
                                 + '<span class="span-5">Ngày tạo</span><span class="span-4">Số câu hỏi</span></li>';
                                 
                        for (i in msg['data'])
                        {
                            html += '<li><span class="span-9"><a href="'+ site_url +'/quiz/view/'
                                 +  msg['data'][i]['quiz_id'] + '">'+ msg['data'][i]['quiz_title'] +'</a></span>'
                                 +  '<span class="span-4">'+ msg['data'][i]['username'] +'</span>'
                                 +  '<span class="span-5">'+ msg['data'][i]['created_on'] +'</span>'
                                 +  '<span class="span-4">'+ msg['data'][i]['question_total'] +' câu</span></li>';
                        }
                        
                        html += '</ul>';
                    }
                    else
                    {
                        html = 'Không tìm thấy kết quả nào với từ khóa <em><b>"'+ text +'"<b></em>';
                    }
                    
                    $("#search-result").hide().html(html).slideDown('slow');
                    
                return false;                           
                },
                error: function(msg){
                    alert(msg);
                }
        });
    return false;    
    });

});




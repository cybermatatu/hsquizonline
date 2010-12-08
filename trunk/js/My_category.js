function create_category()
{
    var category_title = $("#category_title").val();
    var code = $("#category_code").val();

    var error = true;
    
    if (category_title == '')
    {
        $("#error_title").text("Bạn chưa nhập tên môn học.");
        error = false;
    }
    else
    {
        $("#error_title").text('');
    }
        
    if (code == '')
    {
        $("#error_code").text("Bạn chưa nhập mã môn học.");
        error = false;
    }
    else
    {
        if (code.length > 10)
        {
            $("#error_code").text("Mã môn học tối đa 10 ký tự.");
            error = false;
        }
        else
        {
            $.ajax({
                type: 'POST',
                url: site_url,
                data: "model=category&action=check_categoryCode&category_code=" + code,
                success: function(data) {
                    if (data == 'true')
                    {
                        $("#error_code").text('');
                    }
                    else
                    {
                        $("#error_code").text("Mã môn học bị trùng.");
                        error = false;  
                    }
                }
            });
        }
            
    }    
    return error;
        
}
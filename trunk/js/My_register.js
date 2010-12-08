function register()
{
    var username = $("#user_name").val();
    var password = $("#user_password").val();
    var email = $("#user_email").val();
    
    // check username and password
    if (username == '' || password == '')
    {
        error = "Bạn chưa nhập thông tin tài khoản.";
        c1 = false;
    }
    else 
    {
        if (username.length < 3 || username.length > 12){
            error = "Tài khoản phải có từ 3 đến 12 ký tự.";
            c1 = false;
        }
        else
        {
            $.ajax({
                type: 'POST',
                url: site_url,
                data: "model=users&action=check_username&username=" + username,
                success: function(data) {
                    if (data == 'true')
                    {
                        c1 = true;
                    }
                    else
                    {
                        error = "Tài khoản đã được sử dụng.";
                        c1 =  false;
                    }
                }
            });
        }
    }
    
    // check email
    if (email == '')
    {
        error = "Bạn chưa nhập email.";
        c2 = false;
    }
    else
    {   
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if (!emailReg.test(email))
        {
            error = "Email không hợp lệ.";
            c2 = false;
        }
        else
        {
            c2 = true;
        }
    }
    
    if (c1 && c2)
    {   
        return true;
    }
    else
    {
        $("#error_signup").text(error);
        return false;
    }  
}


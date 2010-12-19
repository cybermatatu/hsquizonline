<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Mr.Alex" />
    
    <link rel="stylesheet" type="text/css" href="<?PHP echo base_url()?>css/screen.css" />
    <link rel="stylesheet" type="text/css" href="<?PHP echo base_url()?>css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?PHP echo base_url()?>css/jquery-ui.css" />
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="http://quiz.online/css/ie8.css" media="screen, projection" />
    <![endif]-->
    <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="http://quiz.online/css/ie.css" media="screen, projection" />
    <![endif]-->
    <script type="text/javascript">
        var base_url = "<?PHP echo base_url();?>";
        var site_url = "<?PHP echo site_url();?>";
        var current_url = "<?PHP echo current_url();?>";                
    </script>
    <script type="text/javascript" src="<?PHP echo base_url()?>js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="<?PHP echo base_url()?>js/jquery-ui-1.8.6.custom.min.js"></script>
    <script type="text/javascript" src="<?PHP echo base_url()?>js/jquery.tgc.countdown.js"></script>
    <script type="text/javascript" src="<?PHP echo base_url()?>js/crypt.js"></script>
    <script type="text/javascript" src="<?PHP echo base_url()?>js/My_script.js"></script>
           
	<title>Hệ Thống Trắc Nghiệm Trực Tuyến - Đề Án Chuyên Ngành B - ĐH Hoa Sen - 2010</title>
</head>

<body>
<div id="top_toggle">
    Something...
</div>
<div id="top_face"><div class="container">
    <div id="logo">&nbsp;</div>    
</div></div>
<div class="header">
    <div class="container">
        <ul class="menu">
            <li><a href="#"><img src="<?php echo base_url(); ?>images/icons/home.png" /><br />Home</a></li>
            <li><a href="#"><img src="<?php echo base_url(); ?>images/icons/email.png" /><br />Contact</a></li>
            <li><a href="#"><img src="<?php echo base_url(); ?>images/icons/help.png" /><br />Help</a></li>
            
        </ul>
    </div>
</div>


<div class="main">
    <div class="container">
        <div style="margin-top: 70px; text-align: center">
            <h2 class="red">Hệ Thống Trắc Nghiệm Online</h2>
        </div>
        <div id="login">
            <form id="login_form" name="login" method="post" action="">
            <ul>
                <li><label>Tài khoản:</label></li>
                <li><input type="text" id="login_username" name="username" class="text" /></li>
                <li><label>Mật khẩu:</label></li>
                <li><input type="password" id="login_password" name="password" class="text" /></li>
                <li><br />
                    <input type="submit" id="login_button" name="login" value="Đăng nhập" class="button logon" />
                    <span><a href="#">Quên mật khẩu</a></span>
                </li>
                <li id="login_error" class="hide"></li>
            </ul>
            </form>
        </div>
    </div>
</div>

<div class="footer">
    <div class="container">
        Đề án chuyên ngành B - Đại Học HoaSen - Copyright &copy; 2010
    </div>
</div>

</body>
</html>

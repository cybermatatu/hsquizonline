<?php 
if (!isset($_SESSION['user_id']))
{
    $this->load->view('user_login_view');
}
else
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Mr.Alex" />
    
    <link rel="stylesheet" type="text/css" href="<?PHP echo base_url()?>css/screen.css" />
    <link rel="stylesheet" type="text/css" href="<?PHP echo base_url()?>css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?PHP echo base_url()?>css/jquery-ui-1.8.6.custom.css" />
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
            <li><a href="<?php echo site_url(); ?>"><img src="<?php echo base_url(); ?>images/icons/home.png" /><br />Trang Chủ</a></li>
            <li><a href="<?php echo site_url(); ?>/quiz"><img src="<?php echo base_url(); ?>images/icons/test.png" /><br />Đề Thi</a></li>
            <li><a href="<?php echo site_url(); ?>/category"><img src="<?php echo base_url(); ?>images/icons/subject.png" /><br />Môn Học</a></li>
            <li><a href="#"><img src="<?php echo base_url(); ?>images/icons/report.png" /><br />Báo Cáo</a></li>
            <li><a href="<?php echo site_url(); ?>/users"><img src="<?php echo base_url(); ?>images/icons/student.png" /><br />Người Dùng</a></li>
            <li><a href="<?php echo site_url(); ?>/help"><img src="<?php echo base_url(); ?>images/icons/help.png" /><br />Giúp Đỡ</a></li>
            
        </ul>
    </div>
</div>

<div class="main">
<?PHP
    echo $content;
?>
</div>

<div class="footer">
    <div class="container">Đề án chuyên ngành B - Đại Học HoaSen - Copyright &copy; 2010</div>
</div>
</body>
</html>
<?php
}
?>
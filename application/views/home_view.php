<div class="container">
<div class="content">
    <div class="home-top">        
        <div class="span-8 box radius">
            <label>Xin chào <a href="#" class="red"><?php echo $_SESSION['user_name']; ?></a></label> 
            <em><a href="<?php echo site_url();?>/users/logout">(Thoát)</a></em>
            <p>
            Bạn là <?php 
                        if ($_SESSION['user_type'] == 1)
                            echo 'Administrator'; 
                        elseif ($_SESSION['user_type'] == 2)
                            echo 'Teacher'; 
                        else
                            echo 'Student'; 
                   ?>
            </p>
        </div>
    </div>
</div>
</div>
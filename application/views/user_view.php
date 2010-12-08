<script type="text/javascript" src="<?php echo base_url(); ?>js/My_register.js"></script>
<div class="container">
<div class="content">
    <div id="signup_form" class="hide">
        <form id="register-form" method="post" action="<?php echo site_url();?>/users/register">
        <fieldset>
            <legend>Thêm tài khoản mới</legend>
                <label>Tài khoản: &nbsp;</label><input id="user_name" type="text" name="user_name" />
                <label>&nbsp;Mật khẩu: &nbsp;</label><input id="user_password" type="password" name="user_password" />
                <label>&nbsp;Email: &nbsp;</label><input id="user_email" type="text" name="user_email" />
                <label>&nbsp;Loại: &nbsp;</label>
                <select name="user_type">
                <?php
                    foreach ($listUserType as $t) {
                        echo '<option value="'.$t->user_type.'">'.$t->user_title.'</option>';
                    }
                ?>
                </select>
                <input type="submit" name="created" class="button" value="Tạo mới" />
            <div id="error_signup" class="red"></div>
        </fieldset>
        </form>
    </div>
    <form action="" method="post">
    <ul class="quiz_list">
        <li class="first">
            <label class="span-1">ID</label>
            <label class="span-4">Username</label>
            <label class="span-6">Email</label>
            <label class="span-4">
            <select name="user_type" onchange="$(this).parents('form').submit()">
                <option value="0" onclick="$(this).parents('form').submit()">Tất cả</option>
                <?php
                    foreach ($listUserType as $t) {
                        echo '<option value="'.$t->user_type.'">'.$t->user_title.'</option>';
                    }
                ?>
            </select>
            </label>
            <label class="span-4">Created On</label>
            <label><a id="show_signup_form" class="button add">Thêm tài khoản mới</a></label>
        </li>
        <?php
        foreach ($listUser as $l) {
            echo '<li>
                    <label class="span-1">'.$l->user_id.'</label>
                    <label class="span-4">'.$l->username.'</label>
                    <label class="span-6">'.$l->email.'</label>
                    <label class="span-4">'.$l->user_title.'</label>
                    <label class="span-4">'.$l->created_on.'</label>
                    <label><a href="#">Edit</a> | <a href="#">Delelte</a></label>
                </li>';
        }
        ?>
    </ul>
    </form>
</div>
</div>
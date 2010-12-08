<div class="container">
<div class="content">
    <h2>Take Quizzes</h2>
    <p>Nói gì giờ trời? chả biết nói cái j hết... :|</p>
    
    <h3 class="clear title-business green">Kinh Doanh</h3><hr />
    <ul class="browse_list">
    <?php
    if (@$business)
    {
        foreach ($business as $b) {
            echo '<li><label>';
            if ($b->st_password != '')
                echo '<span class="icon-lock" title="Có mật khẩu">&nbsp;</span>';        
            echo '<a href="'.site_url().'/quiz/view/'.$b->quiz_id.'" title="'.$b->quiz_title.'">'.$b->quiz_title_sub.'</a></label>
                    <span>Category: <a href="#">Kinh doanh</a></span>
                    <span>Người tạo: <a href="#">'.$b->username.'</a></span>
                    <span>Số câu hỏi: '.$b->question_total.'</span>
                    <span>Số lần thực hiện: '.$b->made_total.'</span>
                  </li>';
        }
    }
    else
        echo 'Chưa có bài Quiz nào.';
    ?>
    </ul>
    &nbsp;
    <h3 class="clear title-education green">Giáo Dục</h3><hr />
    <ul class="browse_list">
    <?php
    if (@$education)
    {
        foreach ($education as $e) {
            echo '<li><label>';
            if ($e->st_password != '')
                echo '<span class="icon-lock" title="Có mật khẩu">&nbsp;</span>';        
            echo '<a href="'.site_url().'/quiz/view/'.$e->quiz_id.'" title="'.$e->quiz_title.'">'.$e->quiz_title_sub.'</a></label>
                    <span>Category: <a href="#">Giáo dục</a></span>
                    <span>Người tạo: <a href="#">'.$e->username.'</a></span>
                    <span>Câu hỏi: '.$e->question_total.'</span>
                    <span>Số lần thực hiện: '.$e->made_total.'</span>
                  </li>';
        }
    }
    else
        echo 'Chưa có bài Quiz nào.';
    ?>
    </ul>
    
    <h3 class="clear title-funny green">Quiz Vui</h3><hr />
    <ul class="browse_list">
    <?php
    if (@$funny)
    {
        foreach ($funny as $f) {
            echo '<li><label>';
            if ($f->st_password != '')
                echo '<span class="icon-lock" title="Có mật khẩu">&nbsp;</span>';              
            echo '<a href="'.site_url().'/quiz/view/'.$f->quiz_id.'" title="'.$f->quiz_title.'">'.$f->quiz_title_sub.'</a></label>
                    <span>Category: <a href="#">Giải trí</a></span>
                    <span>Người tạo: <a href="#">'.$f->username.'</a></span>
                    <span>Câu hỏi: '.$f->question_total.'</span>
                    <span>Số lần thực hiện: '.$f->made_total.'</span>
                  </li>';
        }
    }
    else
        echo 'Chưa có bài Quiz nào.';
    ?>
    </ul>

</div>    
</div>
<div class="container">
<div class="content">
    <h3>Quản lý đề thi</h3>
    <ul class="quiz_list">
        <li class="first">
            <label class="span-1">ID</label>
            <label class="span-8">Tên Đề Thi</label>
            <label class="span-5">Môn Học</label>
            <label class="span-3">Ngày Tạo</label>
            <label class="span-2">Câu Hỏi</label>
            <label><a href="<?php echo site_url(); ?>/quiz/create_quiz" class="button add">Tạo đề thi mới</a></label>
        </li>
        <?php 
        if ($list)
        {
            foreach ($list as $l) {
                if (@$l->quiz_id)
                echo '<li>
                        <span class="span-1">'.$l->quiz_id.'</span>
                        <span class="span-8">
                            <label><a href="'.site_url().'/quiz/view/'.$l->quiz_id.'" class="green">'.$l->quiz_title.'</a></label><br />
                            <em>Người tạo: <a href="#">'.$l->username.'</a></em>
                        </span>
                        <label class="span-5">'.$l->title.'</label>
                        <span class="span-3">'.strftime('%d / %m / %Y <br/> %H giờ %M phút',strtotime($l->created_on)).'</span>
                        <span class="span-2"><label>'.$l->question_total.' câu</label></span>
                        <span class="span-3">
                            <a href="'.site_url().'/quiz/report/'.$l->quiz_id.'" title="Thống kê"><img src="'.base_url().'/images/icons/stats.png" /></a>&nbsp;&nbsp;&nbsp;
                            <a href="'.site_url().'/quiz/report/'.$l->quiz_id.'" title="Chỉnh sửa"><img src="'.base_url().'/images/icons/edit.png" /></a>&nbsp;&nbsp;&nbsp;
                            <a href="'.site_url().'/quiz/report/'.$l->quiz_id.'" title="Xóa"><img src="'.base_url().'/images/icons/comment_delete.gif" /></a>
                        </span>
                        <span class="span-1 right"><input type="checkbox" checked="checked" /></span>
                      </li>'; 
            }
        }
        else
            echo '<li>Chưa có đề thi nào</li>';
        ?>
    </ul>
    <div class="page"><?php  echo $page; ?> </div>  
     
</div>
</div>

<div class="container content">
    <h3>Quản lý môn học</h3>
    <ul class="quiz_list">
        <li class="first">
            <label class="span-1">ID</label>
            <label class="span-3">Mã Môn Học</label>
            <label class="span-8">Tên Môn Học</label>
            <label class="span-4">Người Tạo</label>
            <label class="span-3">Ngày Tạo</label>
            <label><a href="<?php echo site_url(); ?>/category/create_category" class="button add">Tạo môn học mới</a></label>
        </li>
        <?php 
        if ($list)
        {
            foreach ($list as $l) {
                if (@$l->category_id)
                echo '<li>
                        <span class="span-1">'.$l->category_id.'</span>
                        <span class="span-3">'.$l->code.'</span>
                        <span class="span-8">'.$l->title.'</span>
                        <span class="span-4">'.$l->user_id.'</span>
                        <span class="span-3">'.strftime('%d / %m / %Y', $l->created_on).'</span>
                        <span class="span-3">
                            <a href="'.site_url().'/quiz/report/'.$l->category_id.'" title="Danh sách sinh viên"><img src="'.base_url().'/images/icons/student-small.png" /></a>&nbsp;&nbsp;&nbsp;
                            <a href="'.site_url().'/quiz/report/'.$l->category_id.'" title="Chỉnh sửa"><img src="'.base_url().'/images/icons/edit.png" /></a>&nbsp;&nbsp;&nbsp;
                            <a href="'.site_url().'/quiz/report/'.$l->category_id.'" title="Xóa"><img src="'.base_url().'/images/icons/comment_delete.gif" /></a>
                        </span>
                        <span class="right"><input type="checkbox" checked="checked" /></span>
                      </li>'; 
            }
        }
        else
            echo '<li>Chưa có lớp nào</li>';
        ?>
    </ul>
    <div class="page"><?php  echo $page; ?> </div>
</div>

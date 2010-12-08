<script type="text/javascript" src="<?php echo base_url(); ?>/js/My_category.js"></script>
<div class="container">
    <div class="content">
        <h3>Tạo môn học mới</h3>
        <form action="<?php echo site_url();?>/category/create_category" method="post">
        <div class="create_quiz_box">
            <div class="create_quiz_row">
                <div class="span-15 append-1">
                    <label>Tên Môn Học: <em id="error_title" class="red"></em></label>
                    <input type="text" name="title" id="category_title" class="text" style="width: 600px;"/>    
                </div>
                <div class="last">
                    <label>Mã Môn Học: <em id="error_code" class="red"></em></label>
                    <input type="text" id="category_code" name="code" class="text" style="width: 250px;" />
                </div>
            </div>
            <div class="create_quiz_row">
                <label>Mô Tả:</label>
                <textarea id="category_info" name="info" style="width: 98%; height: 100px"></textarea>
            </div>
            <div class="create_quiz_row">
                <label>Danh Sách Sinh Viên:</label>
                <input type="file" class="text" /> <em>file excel (*.xls)</em>
                <br /><br />
                <h3 class="red">Ghi chú:</h3>
                <ul class="red">
                    <li>Nếu danh sách sinh viên trống thì tất cả sinh viên đều có thể làm được các bài thi của lớp này.</li>
                </ul>
            </div>
            <div style="margin: 20px 0;">
                <input type="submit" class="button accept" onclick="return create_category()" value="Hoàn Tất" />
            </div>
        </div>
        </form>
    </div> 
</div>
<div class="container">
<div class="content">
<h3>Tạo đề thi</h3>
<form action="<?php echo site_url();?>/quiz/create_quiz" method="post">
<div class="create_quiz_box">
    <div class="create_quiz_row">
        <div class="span-15 append-1">
            <label>Tiêu Đề Bài Thi:</label>
            <input type="text" name="quiz_title" id="quiz_title" class="text" style="width: 600px;"/>    
        </div>
        <div class="last">
            <label>Môn Học:</label>
            <select name="category_id" class="select" style="width: 260px;">
            <?php
                foreach($category_list as $l) {
                    echo '<option value="'.$l->category_id.'">'.$l->code.' | '.$l->title.'</option>';
                }
            ?>
            </select>
        </div> 
    </div>
    <div class="create_quiz_row">
        <label>Mô Tả:</label>
        <textarea id="quiz_info" name="quiz_info" style="width: 98%; height: 100px"></textarea>
    </div>
    <div class="create_quiz_row" id="question-root">
        <label>Danh Sách Câu Hỏi:</label>
    </div>
    <div class="create_quiz_row">
        <button class="button-add add_question" q_num="1" q_order="1" q_type="1">Chọn 1 đáp án</button>
        <button class="button-add add_question" q_num="1" q_order="1" q_type="2">Chọn nhiều đáp án</button>
        <button class="button-add add_question" q_num="1" q_order="1" q_type="3">Đúng / sai</button>
        <button class="button-add add_question" q_num="1" q_order="1" q_type="4">Tự luận</button>
    </div>
    
    <div class="create_quiz_row" id="setting" style="margin: 10px;">
    	<ul>
    		<li><a href="#tabs-1">Cài Đặt Chung</a></li>
            <li><a href="#tabs-2">Cài Đặt Chi Tiết</a></li>
            <li><a href="#tabs-3">Danh Sách Sinh Viên</a></li>
    	</ul>
    	<div id="tabs-1">
   		    <?php $this->load->view('quiz_create_setting_1'); ?>
    	</div>
        <div id="tabs-2">
            <?php $this->load->view('quiz_create_setting_2'); ?>
    	</div>
        <div id="tabs-3">
            <?php $this->load->view('quiz_create_setting_3'); ?>
        </div>
    </div>
    
    <div class="create_quiz_row">
        <input type="hidden" name="total" id="total" value="0" />
        <input type="submit" class="button-accept" id="create_quiz" name="create_quiz" value="Hoàn Tất" />
    </div>
</div>
</form>
</div>
</div>
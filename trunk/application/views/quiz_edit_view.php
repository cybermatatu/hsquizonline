<div class="container">
<div class="content">
<h3>Sửa đề thi</h3>
<form action="<?php echo site_url();?>/quiz/create_quiz" method="post">
<div class="create_quiz_box">
    <div class="create_quiz_row">
        <div class="span-15 append-1">
            <label>Tiêu Đề Bài Thi:</label>
            <input type="text" name="quiz_title" id="quiz_title" class="text" style="width: 600px;" value="<?php echo $quiz['info']->quiz_title;?>"/>    
        </div>
        <div class="last">
            <label>Môn Học:</label>
            <select name="category_id" class="select" style="width: 260px;">
            <?php
                foreach($category_list as $l) {
                    echo '<option value="'.$l->category_id.'" ';
                    if ($l->category_id == $quiz['info']->category_id)
                        echo 'selected="selected"';
                    echo '>'.$l->code.' | '.$l->title.'</option>';
                }
            ?>
            </select>
        </div> 
    </div>
    <div class="create_quiz_row">
        <label>Mô Tả:</label>
        <textarea id="quiz_info" name="quiz_info" style="width: 98%; height: 100px"><?php echo $quiz['info']->quiz_info;?></textarea>
    </div>
    <div class="create_quiz_row" id="question-root">
        <label>Danh Sách Câu Hỏi:</label>
        <?php
        foreach ($quiz['question'] as $key => $q) {
            switch ($q->q_type)
            {
                case 1: $title = 'Chọn 1 đáp án'; $type = 'radio'; break;
                case 2: $title = 'Chọn nhiều đáp án'; $type = 'checkbox'; break;
                case 3: $title = 'Đúng / Sai'; $type = 'radio'; break;
                case 4: $title = 'Tự luận'; break;
            }
        ?>
            <div id="q_box_<?php echo $key+1;?>" class="question_box">
                <h2>Câu hỏi <span class="q_num"><?php echo $key+1;?></span> - <em><b><?php echo $title;?></b></em><span q_num="<?php echo $key+1;?>" class="question_delete">&nbsp;</span></h2>
                <div class="question_list">
                    <b>Câu hỏi:</b><br />
                    <textarea style="width: 98%; height: 50px;" name="question_title[]"><?php echo $q->q_text;?></textarea>
                    <input type="hidden" value="<?php echo $key+1;?>" name="question_order[]" />
                    <input type="hidden" value="<?php echo $q->q_type;?>" id="q_type_<?php echo $key+1;?>" name="question_type[]" />
                </div>
                <div class="answer_list">
                    <b>Trả lời:</b><br />
                    <?php
                        if ($q->q_type == 4)
                        {
                            echo '<textarea style="width: 98%; height: 100px;" name="answer_'.($key+1).'_title[]" class="textarea"></textarea>';    
                        }
                        else
                        {
                            echo '<ul id="answer_root_'.($key + 1).'">';
                            foreach ($quiz['answer'][$key] as $a_key => $a) {                               
                    ?>
                    
                        <li id="answer_<?php echo ($key+1) . '_' . ($a_key+1);?>">
                            <input type="text" name="answer_<?php echo $key+1;?>_title[]" class="text" value="<?php echo $a->a_text;?>" />
                            <input type="<?php echo $type;?>" value="<?php echo $a_key+1;?>" name="answer_<?php echo $key+1;?>_check[]" class="check" <?php if ($a->a_correct == 1) echo 'checked="checked"';?> /> 
                            <span style="margin-left: 10px;">&nbsp; &nbsp; &nbsp;</span> 
                        </li>
                    
                    <?php 
                            }
                            echo '</ul><br class="clear" />';
                        } 
                        if ($q->q_type == 1 || $q->q_type == 2)
                        {
                    ?>
                    <span style="float: right;"><a order="<?php echo $a_key+1;?>" total="<?php echo $a_key+1;?>" q_num="<?php echo $key+1;?>" class="add_answer_radio">Thêm câu trả lời</a></span>
                    <?php
                        }
                    ?>
                </div>
            </div>
        <?php    
        }
        ?>
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
   		    <?php $this->load->view('quiz_edit_setting_1'); ?>
    	</div>
        <div id="tabs-2">
            <?php $this->load->view('quiz_edit_setting_2'); ?>
    	</div>
        <div id="tabs-3">
            <?php $this->load->view('quiz_edit_setting_3'); ?>
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
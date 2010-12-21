<ul class="setting">
    <li><label><strong>Câu Hỏi</strong></label></li>
    <li>
        <label>Hiển Thị:</label>
        Hiển thị tất cả<input type="radio" name="st_question_show" value="0" <?php if($st->st_question_show == 0) echo 'checked="checked"'; ?> /> 
        Mỗi lần một câu hỏi<input type="radio" name="st_question_show" value="1" <?php if($st->st_question_show == 1) echo 'checked="checked"'; ?>/> 
    </li>
    <li>
        <label>Sắp xếp:</label>
        Mặc định<input type="radio" name="st_question_sort" value="0" <?php if($st->st_question_sort == 0) echo 'checked="checked"'; ?> /> 
        Ngẫu nhiên<input type="radio" name="st_question_sort" value="1" <?php if($st->st_question_sort == 1) echo 'checked="checked"'; ?> /> 
    </li>  
    <li><label><strong>Trả lời</strong></label></li>
    <li>
        <label>Hiển Thị kết quả:</label>
        Không<input type="radio" name="st_score_show" value="0" <?php if($st->st_score_show == 0) echo 'checked="checked"'; ?> /> 
        Có<input type="radio" name="st_score_show" value="1" <?php if($st->st_score_show == 1) echo 'checked="checked"'; ?>/> 
    </li> 
</ul>
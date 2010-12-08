<ul class="question_list">
<?php 
foreach ($quiz['question'] as $q_key => $q) {
    
    echo '<li>';
    echo '<h3>Câu ' . ($q_key+1) . ': '. $q->q_text . '</h3>';
    echo '<ol class="answer_list">';
         if ($quiz['question'][$q_key]->q_type == 2)
            $input_type = 'checkbox';
         else
            $input_type = 'radio';
            
         foreach ($quiz['answer'][$q_key] as $a_key => $a) {
            echo '<li>';
            echo '<input type="'.$input_type.'" name="answer_check_'.($q_key+1).'[]" value="'.$a->a_order.'" />';
            echo $a->a_text;
            echo '</li>';
         }
    echo '</ol>';
    echo '</li>';    
}
?>
</ul>
<hr />
<p align="center">
    <input type="submit" id="quiz_done" value="Hoàn Tất" class="button" style="font-size: 20px; padding: 5px 10px" />
    <input type="hidden" name="id" value="<?php echo $quiz['info']->quiz_id; ?>" /><input type="hidden" name="done" value="1" />
</p>
<?php if ($quiz['setting']->st_time != 0) { ?>
<script type="text/javascript" src="<?PHP echo base_url()?>js/MY_answer.js"></script>
<div id="time_box">
<span class="container">Thời gian còn lại: <span id="counter"><?php echo date('YmdHis', time()+($quiz['setting']->st_time*60)) ?></span></span>
</div>
<?php } ?>
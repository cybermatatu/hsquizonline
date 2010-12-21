<ul class="question_list">
<?php 
$i = 0;
foreach ($quiz['question'] as $q_key => $q) {
    
    //var_dump($quiz['answer'][0][0]);
    if ($q->q_type == 4)
    {
        
        echo '<li>
                <h3>'.$q->q_text.'</h3>
                <textarea name="answer_'.($q_key+1).'[]" style="width: 98%; height: 200px"></textarea>
                <input type="hidden" name="result_'.($q_key+1).'[]" value="'.$result_id[$i++].'" />
              </li>';
    }
    else
     {
        echo '<li>';
        echo '<h3>Câu ' . ($q_key+1) . ': '. $q->q_text . '</h3>';
        echo '<ol class="answer_list">';
             
             
             if ($quiz['question'][$q_key]->q_type == 2)
                $input_type = 'checkbox';
             else
                $input_type = 'radio';
                
             foreach ($quiz['answer'][$q_key] as $a_key => $a) {
                echo '<li>';
                echo '<input type="'.$input_type.'" name="answer_'.($q_key+1).'[]" value='.$a->a_order.' />';
                echo '<input type="hidden" name="result_'.($q_key+1).'[]" value="'.$result_id[$i++].'" />';
                echo $a->a_text;
                echo '</li>';
             }
        echo '</ol>';
        echo '</li>';
    }    
}
?>
</ul>
<hr />
<p align="center">
    <input type="submit" id="quiz_done" value="Hoàn Tất" class="button" style="font-size: 20px; padding: 5px 10px" onchange="" />
    <input type="hidden" name="id" value="<?php echo $quiz['info']->quiz_id; ?>" />
    <input type="hidden" name="q_total" value="<?php echo $quiz['info']->question_total; ?>"/>
    <input type="hidden" name="done" value="1" />
</p>
<script type="text/javascript" src="<?PHP echo base_url()?>js/MY_answer.js"></script>
<?php if ($quiz['setting']->st_time != 0) { ?>
<div id="time_box">
<div>
    <img src="<?php echo base_url();?>/images/icons/clock1.png" />
</div>
<span id="counter"><?php echo date('YmdHis', time()+($quiz['setting']->st_time*60)) ?></span>
</div>
<?php } ?>
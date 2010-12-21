<div class="container">
<div class="content">
    <h3>Các bài thi chưa chấm điểm</h3>
    <ul class="quiz_list">
    <li class="first">
        <label class="span-7">Tên đề thi</label>
        <label class="span-4">Người thực hiện</label>
        <label class="span-4">Ngày thực hiện</label>
        <label class="span-4">Tổng thời gian</label>
    </li>
    
    <?php 
    //var_dump($report);
    if (@$report['process'])
        foreach ($report['process'] as $l) {
            if(@$l->rp_id)
            {
                echo '<li>
                        <span class="span-7"><a href="'.site_url().'/quiz/view/'.$l->quiz_id.'">'.$l->quiz_title.'</a></span>
                        <span class="span-4">'.$l->username.'</span>
                        <span class="span-4">'.strftime('%d/%m/%Y - %H:%M:%S',strtotime($l->date)).'</span>
                        <span class="span-4">'.date('i \m\i\n\s s \s\e\c\s',$l->time).'</span>';
                if ($_SESSION['user_type'] != 3)
                    echo '<span><a href="'.site_url().'/quiz/check/'.$l->rp_id.'" title="Chấm điểm"><img src="'.base_url().'/images/icons/check.png" /></a>&nbsp;&nbsp;&nbsp;</span>';
                echo '</li>'; 
            }
        }
    else
        echo '<li>Chưa có thống kê nào</li>';
    ?>
    </ul>
    <div class="clear">&nbsp;</div>
    
    <h3>Các bài thi đã chấm điểm</h3>
    <ul class="quiz_list">
    <li class="first">
        <label class="span-7">Tên đề thi</label>
        <label class="span-4">Người thực hiện</label>
        <label class="span-4">Ngày thực hiện</label>
        <label class="span-4">Tổng thời gian</label>
        <label class="span-3">Số câu đúng</label>
        <label>Điểm</label>
    </li>
    
    <?php 
    //var_dump($report);
    if (@$report['done'])
        foreach ($report['done'] as $l) {
            if(@$l->rp_id)
            {
                echo '<li>
                        <span class="span-7"><a href="'.site_url().'/quiz/view/'.$l->quiz_id.'">'.$l->quiz_title.'</a></span>
                        <span class="span-4">'.$l->username.'</span>
                        <span class="span-4">'.strftime('%d/%m/%Y - %H:%M:%S',strtotime($l->date)).'</span>
                        <span class="span-4">'.date('i \m\i\n\s s \s\e\c\s',$l->time).'</span>
                        <span class="span-3"><b>'.$l->correct.' / '.($l->correct + $l->wrong).'</b></span>
                        <span>'.$l->score.' / 10</span>
                      </li>'; 
            }
        }
    else
        echo '<li>Chưa có thống kê nào</li>';
    ?>
    </ul>
    
    <div class="page"><?php echo $page; ?></div> 
</div>
</div>

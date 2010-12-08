<div class="container">
<div class="content">
        <h2 align="center" style="color: #205791; text-transform: uppercase;"><?php echo $quiz['info']->quiz_title; ?></h2>
        <hr />
        <div class="quiz_info_box">
            <div class="span-5" style="border-right: 1px dashed #CCC;">
                <ul>
                    <li><strong>Người tạo:&nbsp;</strong> <?php echo $quiz['info']->username; ?></li>
                    <li><strong>Ngày tạo:&nbsp;</strong> <?php echo strftime('%d/%m/%Y',strtotime($quiz['info']->created_on)); ?></li>
                    <li><strong>Thời gian:&nbsp;</strong> <?php echo $quiz['setting']->st_time!=0 ? $quiz['setting']->st_time.' phút' : 'Không giới hạn' ;?></li>
                </ul>
            </div>
            <div class="span-16">
                <b>Mô tả: &nbsp;</b><?php echo $quiz['info']->quiz_info; ?></p>
            </div>
        </div>
        <hr />
        <form id="answer_form" action="" method="post">
        <?php
            echo $quiz_answer;
        ?>
        </form>
</div> 
</div>
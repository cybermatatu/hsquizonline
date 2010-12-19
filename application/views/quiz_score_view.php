<?php
    //var_dump($score);
    
    if (@$score['error'])
        echo '<script>alert("'.$score['error'].'")</script>';
    else
    {
        
?>   
    <h3 class="notice" style="margin: 0 auto; width: 400px; text-align: center;">
        Số câu trả lời đúng: <?php echo $score['correct']; ?><br />
        Số điểm của bạn là: <span class="green"><?php echo $score['score']; ?></span> / 10
    </h3>

    </div>
<?php          
    }                
?>
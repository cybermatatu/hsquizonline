<?php
    //var_dump($score);
    
    if (@$score['error'])
        echo '<script>alert("'.$score['error'].'")</script>';
    else
    {
        
?>   
    <h3 class="notice" style="margin: 0 auto; width: 400px; text-align: center;">Số câu trả lời đúng: <?php echo $score['correct']; ?></h3><br />
    <h3>Lời Nhắn: </h3>
    <p>
    Cảm ơn bạn đã thực hiện bài Quiz.
    </p>
    <hr />
    
    </div>
<?php          
    }                
?>
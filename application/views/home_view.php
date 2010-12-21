<div class="container">
<div class="content">
    <div class="home-top"> 
        <form id="search-form">
        <div class="search">
            <select name="type">
                <option value="title">Tên đề thi</option>
                <option value="id">Mã đề thi</option>
            </select>
            <input type="text" name="text" id="search-text" />
            <input type="submit" name="search" value="" />
        </div> 
        </form> 
        <div class="search-result" id="search-result">
        
        </div>         
    </div><br />
    <?php
        if ($_SESSION['user_type'] ==  1)
        {
    ?>
    <h3 class="title">Đề thi mới nhất:</h3>
    <hr />
    <ul class="home-list">
    <?php
    if (@$quiz)
    {
        //var_dump($quiz);
        foreach ($quiz as $l) {
            if (@$l->quiz_id)
            echo '<li>
                    <span class="span-9"><a href="'.site_url().'/quiz/view/'.$l->quiz_id.'" class="blue">'.$l->quiz_title.'</a></span>
                    <span class="span-4">'.$l->username.'</span>
                    <span class="span-4">'.strftime('%d/%m/%Y - %H:%M',strtotime($l->created_on)).'</span>
                    <span>'.$l->title.'</span>
                  </li>';
        }  
        echo '<li class="home-list-last"><em class="right"><a href="'.site_url().'/quiz/">>> xem tất cả</a></em></li>';  
    }
    else
    {
        echo '<li class="home-list-last">Chưa có thông tin nào.</li>';    
    }
    ?>
    </ul>
    <div class="clear"></div>
    <h3 class="title">Bài làm mới nhất:</h3>
    <hr />
    <ul class="home-list">
    <?php
    if (@$report)
    {
        //var_dump($report);
        foreach ($report['done'] as $l) {
            if (@$l->quiz_id)
            echo '<li>
                    <span class="span-9"><a href="'.site_url().'/quiz/view/'.$l->quiz_id.'" class="blue">'.$l->quiz_title.'</a></span>
                    <span class="span-4">'.$l->username.'</span>
                    <span class="span-4">'.strftime('%d/%m/%Y - %H:%M',strtotime($l->date)).'</span>
                    <span>'.$l->score.'/10</span>
                  </li>';
        } 
        foreach ($report['process'] as $l) {
            if (@$l->quiz_id)
            echo '<li>
                    <span class="span-9"><a href="'.site_url().'/quiz/view/'.$l->quiz_id.'" class="blue">'.$l->quiz_title.'</a></span>
                    <span class="span-4">'.$l->username.'</span>
                    <span class="span-4">'.strftime('%d/%m/%Y - %H:%M',strtotime($l->date)).'</span>
                    <span>'.$l->score.'/10</span>
                  </li>';
        } 
        echo '<li class="home-list-last"><em class="right"><a href="'.site_url().'/report/">>> xem tất cả</a></em></li>';  
    }
    else
    {
        echo '<li class="home-list-last">Chưa có thông tin nào.</li>';    
    }
    ?>
    </ul>
    <?php            
        }
        elseif ($_SESSION['user_type'] == 2)
        {
    ?>
    <h3 class="title">Đề thi đang hoạt động:</h3>
    <hr />
    <ul class="home-list">
    <?php
    if (@$quiz)
    {
        //var_dump($quiz);
        foreach ($quiz as $l) {
            if (@$l->quiz_id)
            echo '<li>
                    <span class="span-9"><a href="'.site_url().'/quiz/view/'.$l->quiz_id.'" class="blue">'.$l->quiz_title.'</a></span>
                    <span class="span-4">'.$l->username.'</span>
                    <span class="span-4">'.strftime('%d/%m/%Y - %H:%M',strtotime($l->created_on)).'</span>
                    <span>'.$l->title.'</span>
                  </li>';
        }  
        echo '<li class="home-list-last"><em class="right"><a href="'.site_url().'/quiz/">>> xem tất cả</a></em></li>';  
    }
    else
    {
        echo '<li class="home-list-last">Chưa có thông tin nào.</li>';    
    }
    ?>
    </ul>
    
    <h3 class="title">Bài làm mới nhất:</h3>
    <hr />
    <ul class="home-list">
    <?php
    if (@$report['done'])
    {
        //var_dump($report);
        foreach ($report['done'] as $l) {
            if (@$l->quiz_id)
            echo '<li>
                    <span class="span-9"><a href="'.site_url().'/quiz/view/'.$l->quiz_id.'" class="blue">'.$l->quiz_title.'</a></span>
                    <span class="span-4">'.$l->username.'</span>
                    <span class="span-4">'.strftime('%d/%m/%Y - %H:%M',strtotime($l->date)).'</span>
                    <span>'.$l->score.'/10</span>
                  </li>';
        } 
        echo '<li class="home-list-last"><em class="right"><a href="'.site_url().'/report/">>> xem tất cả</a></em></li>';  
    }
    else
    {
        echo '<li class="home-list-last">Chưa có thông tin nào.</li>';    
    }
    ?>
    </ul>
    
    <h3 class="title">Bài làm chưa chấm điểm:</h3>
    <hr />
    <ul class="home-list">
    <?php
    if (@$report['process'])
    {
        foreach ($report['process'] as $l) {
            if (@$l->quiz_id)
            echo '<li>
                    <span class="span-9"><a href="'.site_url().'/quiz/view/'.$l->quiz_id.'" class="blue">'.$l->quiz_title.'</a></span>
                    <span class="span-4">'.$l->username.'</span>
                    <span class="span-4">'.strftime('%d/%m/%Y - %H:%M',strtotime($l->date)).'</span>
                    <span>'.$l->score.'/10</span>
                  </li>';
        } 
        echo '<li class="home-list-last"><em class="right"><a href="'.site_url().'/report/">>> xem tất cả</a></em></li>';  
    }
    else
    {
        echo '<li class="home-list-last">Chưa có thông tin nào.</li>';    
    }
    ?>
    </ul>
    <?php
        }
        else{
    ?>
    <h3 class="title">Đề thi chưa làm:</h3>
    <hr />
    <ul class="home-list">
    <?php
    if (@$quiz)
    {
        //var_dump($quiz);
        foreach ($quiz as $l) {
            if (@$l->quiz_id)
            echo '<li>
                    <span class="span-9"><a href="'.site_url().'/quiz/view/'.$l->quiz_id.'" class="blue">'.$l->quiz_title.'</a></span>
                    <span class="span-4">'.$l->username.'</span>
                    <span class="span-4">'.strftime('%d/%m/%Y - %H:%M',strtotime($l->created_on)).'</span>
                    <span>'.$l->title.'</span>
                  </li>';
        }  
        echo '<li class="home-list-last"><em class="right"><a href="'.site_url().'/quiz/">>> xem tất cả</a></em></li>';  
    }
    else
    {
        echo '<li class="home-list-last">Chưa có thông tin nào.</li>';    
    }
    ?>
    </ul>
    
    <h3 class="title">Đề thi đã có điểm:</h3>
    <hr />
    <ul class="home-list">
    <?php
    if (@$report['done'])
    {
        //var_dump($report);
        foreach ($report['done'] as $l) {
            if (@$l->quiz_id)
            echo '<li>
                    <span class="span-9"><a href="'.site_url().'/quiz/view/'.$l->quiz_id.'" class="blue">'.$l->quiz_title.'</a></span>
                    <span class="span-4">'.$l->username.'</span>
                    <span class="span-4">'.strftime('%d/%m/%Y - %H:%M',strtotime($l->date)).'</span>
                    <span>'.$l->score.'/10</span>
                  </li>';
        } 
        echo '<li class="home-list-last"><em class="right"><a href="'.site_url().'/report/">>> xem tất cả</a></em></li>';  
    }
    else
    {
        echo '<li class="home-list-last">Chưa có thông tin nào.</li>';    
    }
    ?>
    </ul>
    
    <h3 class="title">Đề thi chưa có điểm:</h3>
    <hr />
    <ul class="home-list">
    <?php
    if (@$report['process'])
    {
        foreach ($report['process'] as $l) {
            if (@$l->quiz_id)
            echo '<li>
                    <span class="span-9"><a href="'.site_url().'/quiz/view/'.$l->quiz_id.'" class="blue">'.$l->quiz_title.'</a></span>
                    <span class="span-4">'.$l->username.'</span>
                    <span class="span-4">'.strftime('%d/%m/%Y - %H:%M',strtotime($l->date)).'</span>
                    <span>'.$l->score.'/10</span>
                  </li>';
        } 
        echo '<li class="home-list-last"><em class="right"><a href="'.site_url().'/report/">>> xem tất cả</a></em></li>';  
    }
    else
    {
        echo '<li class="home-list-last">Chưa có thông tin nào.</li>';    
    }
    ?>
    </ul>
    <?php
        }
    ?>
    
</div>
</div>
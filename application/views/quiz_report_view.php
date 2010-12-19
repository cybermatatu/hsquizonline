<script type="text/javascript" src="<?php echo base_url(); ?>js/FusionCharts.js"></script>
<script language="JavaScript">	
    <?php 
        $diem = array_count_values($report['diem']);
        echo "var data = new Array('Điểm'";
        for ($i = 0; $i <= 10; $i++) {
            if (@$diem[$i])  
                echo ",".$diem[$i];
            else
                echo ",0";
        }
        echo ");";	
    ?>
    function generateXML(animate){			
			var strXML="";
            
			strXML = "<graph decimalPrecision='0' yAxisName='Users' xAxisName='Thống kê bảng điểm' animation='" + ((animate==true)?"1":"0") + "' " + (" showValues='1' ") + "yaxismaxvalue='0'>";
			strXML = strXML + "<categories><category name='0 điểm' /><category name='1 điểm' /><category name='2 điểm' /><category name='3 điểm' /><category name='4 điểm' /><category name='5 điểm' /><category name='6 điểm' /><category name='7 điểm' /><category name='8 điểm' /><category name='9 điểm' /><category name='10 điểm' /></categories>";			
			strXML = strXML + getProductXML();		
			strXML = strXML + "</graph>";

			return strXML;
		}
		
	function getProductXML(){		
		var productXML;
		productXML = "<dataset color='8BBA00' >";		
		for (var i=1; i<=11; i++){
            if (i == 6)
                productXML = productXML + "<set value='" + data[i] + "' />";
            else
                productXML = productXML + "<set value='" + data[i] + "' />";
            
		}
		productXML = productXML + "</dataset>";
		return productXML;			
	}	
</script>
<div class="container">
<div class="content">
    <h2>Thống kê</h2>
    <div id="stat">
    Stat here!
    </div>
    <script type="text/javascript">
        var chart1 = new FusionCharts(base_url + "js/FCF_MSColumn3D.swf", "chart1Id", "900", "400");		   
    	var strXML=generateXML(false);
    	chart1.setDataXML(strXML);
    	chart1.render("stat");
        </script>
    <h2>Báo cáo</h2>
    <ul class="quiz_list">
        <li class="first">
            <label class="span-4">Date</label>
            <label class="span-6">Username</label>
            <label class="span-4">Time Taken</label>
            <label class="span-4">Correct</label>
            <label class="span-4">Score</label>
        </li>
        <?php 
        //var_dump($report['diem']);
        if ($report)
            foreach ($report as $l) {
                if(@$l->rp_id)
                {
                    echo '<li>
                            <span class="span-4">'.strftime('%d/%m/%Y - %H:%M:%S',strtotime($l->date)).'</span>
                            <span class="span-6"><a href="#">'.$l->username.'</a></span>
                            <span class="span-4">'.date('i \m\i\n\s s \s\e\c\s',$l->time).'</span>
                            <span class="span-4"><b>'.$l->correct.' / '.($l->correct + $l->wrong).'</b></span>
                            <span class="span-4">'.$l->score.' / 10</span>
                          </li>'; 
                }
            }
        else
            echo '<li>Chưa có thống kê nào</li>';
        ?>
    </u>
</div>
</div>

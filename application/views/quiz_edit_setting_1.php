<script type="text/javascript" src="<?php echo base_url()?>js/jquery.timePicker.min.js"></script>
<?php $st = $quiz['setting'];?>
<ul class="setting">
    <li>
        <label>Tình trạng:</label>
        Mở<input class="st_status" type="radio" name="st_status" value="1" <?php if($st->st_status == 1) echo 'checked="checked"' ?> /> 
        Khóa<input class="st_status" type="radio" name="st_status" value="0" <?php if($st->st_status == 0) echo 'checked="checked"' ?>/>
        Thời hạn<input type="radio" id="st_status" name="st_status" value="2" <?php if($st->st_status == 2) echo 'checked="checked"' ?>/>
        <div id="st_status_box" <?php if($st->st_status != 2) echo 'class="hide"' ?>>
            <div>Bắt đầu &nbsp;<input type="text" id="st_day_start" name="st_day_start" value="<?php echo date('m/d/Y',strtotime($st->st_date_start));?>" /> 
            <input type="text" id="st_time_start" name="st_time_start" value="<?php echo date('H:i',strtotime($st->st_date_start));?>" /></div>
            <div><label>&nbsp;</label>Kết thúc <input type="text" id="st_day_end" name="st_day_end" value="<?php echo date('m/d/Y',strtotime($st->st_date_end));?>" /> 
            <input type="text" id="st_time_end" name="st_time_end" value="<?php echo date('H:i',strtotime($st->st_date_end));?>" /></div>
        </div>
    </li>
    <li>
        <label>Mật Khẩu:</label>
        Không<input type="radio" name="st_pass_check" id="st_pass_N" <?php if($st->st_password == 0) echo 'checked="checked"' ?> /> 
        Có<input type="radio" name="st_pass_check" id="st_pass_Y" style="margin-right: 5px" <?php if($st->st_password != 0) echo 'checked="checked"' ?>/>
        <input type="text" name="st_pass" id="st_pass" size="20"<?php if ($st->st_password != 0) echo 'value="'.$st->st_password.'"'; else echo 'class="hide"'; ?>  />
    </li>
    <li>
        <label>Thời Gian:</label>
        Không<input type="radio" name="st_time_check" id="st_time_N" <?php if ($st->st_time == 0) echo 'checked="checked"';?> /> 
        Có<input type="radio" name="st_time_check" id="st_time_Y" style="margin-right: 5px" <?php if ($st->st_time != 0) echo 'checked="checked"';?> />
        <input type="text" name="st_time" id="st_time" size="5" <?php echo $st->st_time != 0 ? 'value="'.$st->st_time.'"' : 'value="0" class="hide"' ?> /> <em>Thời gian được tính bằng phút.</em>
    </li>
    <li>
        <label>Số lần thực hiện:</label>
        Một lần<input type="radio" name="st_limit" value="1" <?php if($st->st_limit == 1) echo 'checked="checked"'; ?> /> 
        Không giới hạn<input type="radio" name="st_limit" value="0" <?php if($st->st_limit == 0) echo 'checked="checked"'; ?> /> 
    </li>
</ul>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.timePicker.min.js"></script>
<ul class="setting">
    <li>
        <label>Tình trạng:</label>
        Mở<input class="st_status" type="radio" name="st_status" value="1" checked="checked" /> 
        Khóa<input class="st_status" type="radio" name="st_status" value="0" />
        Thời hạn<input type="radio" id="st_status" name="st_status" />
        <div id="st_status_box" class="hide">
            <div>Bắt đầu &nbsp;<input type="text" id="st_day_start" name="st_day_start" /> <input type="text" id="st_time_start" name="st_time_start" /></div>
            <div><label>&nbsp;</label>Kết thúc <input type="text" id="st_day_end" name="st_day_end" /> <input type="text" id="st_time_end" name="st_time_end" /></div>
        </div>
    </li>
    <li>
        <label>Mật Khẩu:</label>
        Không<input type="radio" name="st_pass_check" id="st_pass_N" checked="checked" /> 
        Có<input type="radio" name="st_pass_check" id="st_pass_Y" style="margin-right: 5px"/>
        <input type="text" name="st_pass" id="st_pass" size="20" value="" class="hide" />
    </li>
    <li>
        <label>Thời Gian:</label>
        Không<input type="radio" name="st_time_check" id="st_time_N" checked="checked" /> 
        Có<input type="radio" name="st_time_check" id="st_time_Y" style="margin-right: 5px" />
        <input type="text" name="st_time" id="st_time" size="5" value="0" class="hide" /> <em>Thời gian được tính bằng phút.</em>
    </li>
    <li>
        <label>Số lần thực hiện:</label>
        Một lần<input type="radio" name="st_loop" value="0" checked="checked" /> 
        Không giới hạn<input type="radio" name="st_loop" value="1" /> 
    </li>
</ul>
<ul class="setting">
    <li>
        <label><input type="radio" name="dssv" />Theo môn học:</label>
        <select name="category_code" style="width: 240px;">
        <option value="0">[ Default ]</option>
    <?php
        foreach($category_list as $l) {
            echo '<option value="'.$l->category_id.'">'.$l->code.' | '.$l->title.'</option>';
        }
    ?>
    </select>
    </li>
    <li>
        <label><input type="radio" name="dssv" />Nhập từ file:</label>
        <input type="file" class="text" />
    </li>
    <li>
        <label><input type="radio" name="dssv" />Danh sách mới:</label>
    </li>
</ul>
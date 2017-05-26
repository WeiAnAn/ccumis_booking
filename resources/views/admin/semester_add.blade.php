<form action='{{URL("/admin/semester_add")}}' method="post">
    {{csrf_field()}}
    <div class="form-group">
        <label for="">學年度</label>
        <input type="number" class="form-control" name="year" >
    </div>
    <div class="form-group">
        <label for="">學期</label>
        <select name="semester" id="semester" class="form-control">
            <option value="1">上學期</option>
            <option value="2">下學期</option>
        </select>
    </div>
    <div class="form-group">
        <label for="start_date">學期開始日期</label>
        <input type="text" class="form-control" id="start_date" name="start_date">
    </div>
    <div class="form-group">
        <label for="end_date">學期結束日期</label>
        <input type="text" class="form-control" id="end_date" name="end_date">
    </div>
    <button type="submit" class="btn btn-primary">送出</button>
</form>

<script>
    $('#start_date').datepicker({
        format: "yyyy-mm-dd",
        autoclose : true,
        language: 'zh-TW'
    });
    $('#end_date').datepicker({
        format: "yyyy-mm-dd",
        autoclose : true,
        language: 'zh-TW'
    });

</script>
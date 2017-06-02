<form action='{{URL("/admin/semester_add")}}' method="post">
    {{csrf_field()}}
    <div class="form-group">
        <label for="">學年度</label>
        @if($errors->has('year'))
        <p class="text-danger"><strong>{{$errors->first('year')}}</strong></p>
        @endif
        <input type="number" class="form-control" name="year" value="{{old('year')}}" required>
    </div>
    <div class="form-group">
        <label for="">學期</label>
        @if($errors->has('semester'))
        <p class="text-danger"><strong>{{$errors->first('semester')}}</strong></p>
        @endif
        <select name="semester" id="semester" class="form-control">
            <option value="1">上學期</option>
            <option value="2">下學期</option>
        </select>
    </div>
    <div class="form-group">
        <label for="start_date">學期開始日期</label>
        @if($errors->has('start_date'))
        <p class="text-danger"><strong>{{$errors->first('start_date')}}</strong></p>
        @endif
        <input type="text" class="form-control" id="start_date" name="start_date" required>
    </div>
    <div class="form-group">
        <label for="end_date">學期結束日期</label>
        @if($errors->has('end_date'))
        <p class="text-danger"><strong>{{$errors->first('end_date')}}</strong></p>
        @endif
        <input type="text" class="form-control" id="end_date" name="end_date" required>
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
    @if(count($errors)>0)
    $('#semester')[0].value ="{{old('semester')}}";
    $('#start_date').datepicker('setDate', "{{old('start_date')}}");
    $('#end_date').datepicker('setDate', "{{old('end_date')}}");
    @endif
</script>
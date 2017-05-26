@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('layouts.admin')
    </div> 
    <!-- Tab panes -->
    <div class="col-md-9">
        <form action='{{URL("/admin/semester_update/$id")}}' method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="">學年度</label>
                <input type="number" class="form-control" name="year" value={{$year}}>
            </div>
            <div class="form-group">
                <label for="">學期</label>
                <select name="semester" id="semester" class="form-control" value={{$semester}}>
                    <option value="1">上學期</option>
                    <option value="2">下學期</option>
                </select>
            </div>
            <div class="form-group">
                <label for="start_date">學期開始日期</label>
                <input type="text" class="form-control" id="start_date" name="start_date" value="{{$start_date}}">
            </div>
            <div class="form-group">
                <label for="end_date">學期結束日期</label>
                <input type="text" class="form-control" id="end_date" name="end_date" value="{{$end_date}}">
            </div>
            <button type="submit" class="btn btn-primary">修改</button>
        </form>

        <script>
            $('#start_date').datepicker({
                format: "yyyy-mm-dd",
                autoclose : true,
                language: "zh-TW"
            });
            $('#end_date').datepicker({
                format: "yyyy-mm-dd",
                autoclose : true,
                language: "zh-TW"
            });
            $('#semester')[0].value = {{$semester}}
        </script>
    </div>
</div>

@endsection

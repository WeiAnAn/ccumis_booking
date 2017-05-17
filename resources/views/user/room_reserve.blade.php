@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('layouts.user')
    </div> 
    <!-- Tab panes -->
    <div class="tab-content col-md-8">
        <div class="usrcontent">填寫課程資訊</div>
        <div class="custom_seperator"></div>
        
        <div class="row">
            <div class="col-xs-4 usrclassinfo">
                <label class="usrlabel">課程名稱</label>
                <input type="text" class="form-control">
                
                <label class="usrlabel">事由</label>
                <select class="form-control">
                    <option>上課</option>
                    <option>考試</option>
                    <option>meeting</option>
                    <option>辦活動</option>
                </select>
            
            </div>    
        </div>
        
        <div class="usrcontent">選擇時間及教室</div>
        <div class="custom_seperator"></div>
    
        <div class="row">
            <div class="col-xs-4 usrclassinfo">
                <label class="usrlabel">日期</label>
                <div class='input-group' >
                    <input type="text" class="form-control datepicker" id="datepicker1">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>    
    </div>
</div>

<script type="text/javascript">
    $('#datepicker1').datepicker();
</script>

@endsection    

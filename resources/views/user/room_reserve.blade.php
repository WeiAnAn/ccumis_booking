@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('layouts.user')
    </div> 
    <!-- Tab panes -->
        <div class="tab-content col-md-8">
            <form action="{{URL('/user/room_reserve_add')}}" method="post">
                {{csrf_field()}}
                <div class="usrcontent">填寫課程資訊</div>
                <div class="custom_seperator"></div>
                
                <div class="row">
                    <div class="col-xs-12 usrclassinfo">
                        <label class="usrlabel">課程名稱</label>
                        @if($errors->has('name'))
                        <p class="text-danger"><strong>{{$errors->first('name')}}</strong></p>
                        @endif
                        <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" required>
                        
                        <label class="usrlabel">事由</label>
                        <select class="form-control" name="type" id="type">
                            <option value="1">上課</option>
                            <option value="2">考試</option>
                            <option value="3">會議</option>
                            <option value="4">活動</option>
                        </select>
                    
                    </div>    
                </div><!--row of class-->
                
                <div class="usrcontent">選擇時間及教室</div>
                <div class="custom_seperator"></div>
        
                <div class="row">
                    <div class="col-xs-12 col-lg-6 usrclassinfo">
                        <label class="usrlabel">日期</label>
                        @if($errors->has('date'))
                        <p class="text-danger"><strong>{{$errors->first('date')}}</strong></p>
                        @endif
                        <div class='input-group' >
                            <input type="text" class="form-control datepicker" id="datepicker1" name="date" required>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        
                        <label class="usrlabel ">時間</label>
                        @if($errors->has('time'))
                        <p class="text-danger"><strong>{{$errors->first('time')}}</strong></p>
                        @endif
                        <div class="input-group">
                            <div class="col-xs-12 mobile_block">
                                <div class="input-append">
                                    <select class="usrselect" name="startHour" id="startHour">
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                    </select>
                                    <span class="usradd-on">點</span>
                                </div>
                                <div class="input-append">
                                    <select class="usrselect" name="startMin" id="startMin">
                                        <option value="00">00</option>
                                        <option value="05">05</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                        <option value="25">25</option>
                                        <option value="30">30</option>
                                        <option value="35">35</option>
                                        <option value="40">40</option>
                                        <option value="45">45</option>
                                        <option value="50">50</option>
                                        <option value="55">55</option>
                                    </select>
                                    <span class="usradd-on">分</span>
                                </div>
                            </div>
                            <span class="usrspan mobile_block hidden-xs">~</span>
                            <span class="usrspan mobile_block visible-xs">到</span>
                            <div class="col-xs-12 mobile_block">   
                                <div class="input-append">
                                    <select class="usrselect" name="endHour" id="endHour">
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                    </select>
                                    <span class="usradd-on">點</span>
                                </div>
                                <div class="input-append">
                                    <select class="usrselect" name="endMin" id="endMin">
                                        <option value="00">00</option>
                                        <option value="05">05</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                        <option value="25">25</option>
                                        <option value="30">30</option>
                                        <option value="35">35</option>
                                        <option value="40">40</option>
                                        <option value="45">45</option>
                                        <option value="50">50</option>
                                        <option value="55">55</option>
                                    </select>
                                    <span class="usradd-on">分</span>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                    <div class="col-xs-12 col-lg-6 usrclassinfo">
                        <label class="usrlabel">教室</label>
                        <select class="form-control" name="classroom_id" id="classroom_id">
                            @foreach($classrooms as $classroom)
                            <option value="{{$classroom->id}}">{{$classroom->name." (人數:$classroom->count)"}}</option>
                            @endforeach
                        </select>
                    </div>
                </div><!--row of time and classroom-->    
                <button type="submit" class="btn btn-default">送出</button>

            </form>
        </div><!--end of tab-content col-md-8-->
</div>

<script type="text/javascript">
$('#datepicker1').datepicker({
    format: "yyyy-mm-dd",
    language: "zh-TW",
    autoclose: true
});
@if(count($errors)>0)
    $('#type')[0].value ="{{old('type')}}";
    $('#startHour')[0].value ="{{old('startHour')}}";
    $('#startMin')[0].value ="{{old('startMin')}}";
    $('#endHour')[0].value ="{{old('endHour')}}";
    $('#endMin')[0].value ="{{old('endMin')}}";
    $('#classroom_id')[0].value ="{{old('classroom_id')}}";
    $('#datepicker1').datepicker('setDate', "{{old('date')}}");
@endif
</script>

@endsection    

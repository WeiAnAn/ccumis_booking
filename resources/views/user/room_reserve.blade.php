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
                    <div class="col-xs-4 usrclassinfo">
                        <label class="usrlabel">課程名稱</label>
                        <input type="text" class="form-control" name="name">
                        
                        <label class="usrlabel">事由</label>
                        <select class="form-control" name="type">
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
                    <div class="col-xs-4 usrclassinfo">
                        <label class="usrlabel">日期</label>
                        <div class='input-group' >
                            <input type="text" class="form-control datepicker" id="datepicker1" name="date" >
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        
                        <label class="usrlabel">時間</label>
                        <div class="controls form-inline">
                            <div class="input-append">
                                <select class="usrselect" name="startHour">
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
                                <select class="usrselect" name="startMin">
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
                            <span class="usrspan">~</span>    
                            <div class="input-append">
                                <select class="usrselect" name="endHour">
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
                                <select class="usrselect" name="endMin">
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
                    <div class="col-xs-3 usrclassinfo">
                        <label class="usrlabel">教室</label>
                        <select class="form-control" name="classroom_id">
                            @foreach($classrooms as $classroom)
                            <option value="{{$classroom->id}}">{{$classroom->name." (人數:$classroom->count)"}}</option>
                            @endforeach
                        </select>
                    </div>
                </div><!--row of time and classroom-->    
   
                <div class="usrcontent">選擇設備</div>
                <div class="custom_seperator"></div>
                
                <div class="row">
                    <div class="col-xs-12 usrclassinfo">
                        <div class="col-xs-2">
                            <div class="checkbox">
                                <label class="equipLabel">
                                    <input type="checkbox" value="">
                                    鑰匙
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="checkbox">
                                <label class="equipLabel">
                                    <input type="checkbox" value="">
                                    筆電 
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="checkbox">
                                <label class="equipLabel">
                                    <input type="checkbox" value="">
                                    投影機 
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="checkbox">
                                <label class="equipLabel">
                                    <input type="checkbox" value="">
                                    投影幕
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="checkbox">
                                <label class="equipLabel">
                                    <input type="checkbox" value="">
                                    投影筆
                                </label>
                            </div>
                        </div>
                    </div><!-- col-xs-12 -->
                    
                    <div class="col-xs-12 usrclassinfo">
                        <div class="col-xs-2">
                            <div class="checkbox">
                                <label class="equipLabel">
                                    <input type="checkbox" value="" class="check">
                                    推車 
                                    <div class="defaultHide defaultWidth">
                                        <label class="equipLabelx">x</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="checkbox">
                                <label class="equipLabel">
                                    <input type="checkbox" value="" class="check">
                                    掃把
                                    <div class="defaultHide defaultWidth">
                                        <label class="equipLabelx">x</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="checkbox">
                                <label class="equipLabel">
                                    <input type="checkbox" value="">
                                    黑金剛
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="checkbox">
                                <label class="equipLabel">
                                    <input type="checkbox" value="">
                                    海報架
                                </label>
                            </div>
                        </div>
                    </div><!-- col-xs-12 -->

                </div><!--row of equip-->
                
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
</script>

@endsection    

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
                    <option>會議</option>
                    <option>活動</option>
                </select>
            
            </div>    
        </div><!--row of class-->
        
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
                
                <label class="usrlabel">時間</label>
                <div class="controls form-inline">
                    <div class="input-append">
                        <select class="usrselect">
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
                        <select class="usrselect">
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
                        <select class="usrselect">
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
                        <select class="usrselect">
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
                <select class="form-control">
                    <option>216</option>
                    <option>349</option>
                    <option>512</option>
                    <option>617</option>
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
                    <label>x</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-xs-2">
                    <div class="checkbox">
                        <label class="equipLabel">
                            <input type="checkbox" value="">
                            筆電 
                        </label>
                    </div>
                    <label>x</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-xs-2">
                    <div class="checkbox">
                        <label class="equipLabel">
                            <input type="checkbox" value="">
                            投影機 
                        </label>
                    </div>
                    <label>x</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-xs-2">
                    <div class="checkbox">
                        <label class="equipLabel">
                            <input type="checkbox" value="">
                            投影幕
                        </label>
                    </div>
                    <label>x</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-xs-2">
                    <div class="checkbox">
                        <label class="equipLabel">
                            <input type="checkbox" value="">
                            投影筆
                        </label>
                    </div>
                    <label>x</label>
                    <input type="text" class="form-control">
                </div>
            </div><!-- col-xs-12 -->
            
            <div class="col-xs-12 usrclassinfo">
                <div class="col-xs-2">
                    <div class="checkbox">
                        <label class="equipLabel">
                            <input type="checkbox" value="">
                            推車 
                        </label>
                    </div>
                </div>
                <div class="col-xs-2">
                    <div class="checkbox">
                        <label class="equipLabel">
                            <input type="checkbox" value="">
                            掃把
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
                <div class="col-xs-2">
                    <div class="checkbox">
                        <label class="equipLabel">
                            <input type="checkbox" value="">
                            其他
                        </label>
                    </div>
                </div>
            </div><!-- col-xs-12 -->

        </div><!--row of equip-->

    </div><!--end of col-md-8-->
</div>

<script type="text/javascript">
    $('#datepicker1').datepicker();
</script>

@endsection    

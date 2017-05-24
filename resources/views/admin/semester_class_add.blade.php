<form action='{{URL("/admin/semester_class_add")}}' method="post">
    {{csrf_field()}}
    <div class="form-group">
        <label for="semester_id">學期</label>
        <select name="semester_id" id="semester_id" class="form-control">
            @foreach($semesters as $semester)
            <option value="{{$semester->id}}">
                {{$semester->year}}{{$semester->semester == 1 ? "上" : "下"}}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">星期</label>
        <select class="form-control" name="day" id="day">
            <option value="1">星期一</option>
            <option value="2">星期二</option>
            <option value="3">星期三</option>
            <option value="4">星期四</option>
            <option value="5">星期五</option>
        </select>
    </div>
    <div class="form-group">
        <label for="classroom">教室</label>
        <select name="classroom_id" id="classroom" class="form-control">
            @foreach($classrooms as $classroom)
            <option value="{{$classroom->id}}">{{$classroom->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">時間</label>
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
    <div class="form-group">
        <label for="name">課程名稱</label>
        <input type="text" class="form-control" name="name">
    </div>
    <div class="form-group">
        <label for="">教師名稱</label>
        <input type="text" class="form-control" name="borrower">
    </div>
    <button type="submit" class="btn btn-primary">送出</button>
</form>
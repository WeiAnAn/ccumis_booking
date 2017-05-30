@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('layouts.admin')
    </div> 
    <!-- Tab panes -->
    <div class="tab-content col-md-9">
        <form action="{{URL('/admin/return')}}" method="post">
            {{csrf_field()}}
            <div class="usrcontent">未歸還教室</div>
            <div class="custom_seperator"></div>

            <div class="booking-classroom table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th id="selectAll">
                                <input type="checkbox" id="checkbox" onclick="selectAllClassroom(event)">
                            </th>
                            <th>教室</th>
                            <th>日期</th>
                            <th>時間</th>
                            <th>課程名稱</th>
                            <th>借用人</th>
                            <th>電話</th>
                            <th>借出時間</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($classrooms as $classroom)
                        <tr>
                            <td>
                                <input type="checkbox" name="classroom[]" value="{{$classroom->id}}" id="classroomBox">
                            </td>
                            <td>{{$classroom->classroom->name}}</td>
                            <td>{{$classroom->date}}</td>
                            <td>
                                {{date('H:i',strtotime($classroom->start_time))}} ~
                                {{date('H:i',strtotime($classroom->end_time))}}
                            </td>
                            <td>{{$classroom->name}}</td>
                            <td>{{$classroom->user->name}}</td>
                            <td>{{$classroom->user->phone}}</td>
                            <td>{{$classroom->borrow_datetime}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="usrcontent">未歸還設備</div>
            <div class="custom_seperator"></div>

            <div class="booking-classroom table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th id="selectAll">
                                <input type="checkbox" onclick="selectAllEquipment(event)">
                            </th>
                            <th>設備</th>
                            <th>數量</th>
                            <th>借用人</th>
                            <th>手機</th>
                            <th>借出時間</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($equipment as $item)
                        <tr>
                            <td>
                                <input type="checkbox" name="item[]" value="{{$item->id}}" id="equipmentBox">
                            </td>
                            <td>{{$item->equipment->name}}</td>
                            <td>{{$item->count}}</td>
                            <td>{{$item->user->name}}</td>
                            <td>{{$item->user->phone}}</td>
                            <td>{{$item->borrow_datetime}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <button class="btn btn-primary">歸還</button>
        </form>
            
    </div><!--end of tab-content col-md-8-->
    <script>
        function selectAllEquipment(event){
            var equipment = $('[id=equipmentBox]');
            for(var i=0; i<equipment.length;i++){
                var item = equipment[i];
                item.checked = event.target.checked;
            }
        }

        function selectAllClassroom(event){
            var classroom = $('[id=classroomBox]');
            for(var i=0; i<classroom.length;i++){
                var item = classroom[i];
                item.checked = event.target.checked;
            }
        }
    </script>
</div>    

@endsection    

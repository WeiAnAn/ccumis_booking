@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('layouts.admin')
    </div> 
    <!-- Tab panes -->
    <div class="col-md-9">
        <div class="custom_adnav">
            <div class="usrcontent">學期課程管理</div>
            <div class="custom_seperator"></div></br>
            <ul class="nav nav-tabs" id="roomManage" role="tablist">
                <li role="presentation">
                    <a href="#view" aria-controls="view" role="tab" data-toggle="tab">檢視</a>
                </li>
                <li role="presentation">
                    <a href="#create" aria-controls="create" role="tab" data-toggle="tab">新增</a>
                </li>
            </ul>        
            <div class="tab-content"> 
                <div role="tabpanel" class="tab-pane custom_adcontent" id="view">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>學年度</th>
                                    <th>課程名稱</th>
                                    <th>教室</th>
                                    <th>星期</th>
                                    <th>開始時間</th>
                                    <th>結束時間</th>
                                    <th>上課教師</th>
                                    <th>管理</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($semesterClasses as $class)
                                <tr>
                                    <td>
                                        {{$class->semester->year}}
                                        {{$class->semester->semester == 1 ? "上":"下" }}
                                    </td>
                                    <td>{{$class->name}}</td>
                                    <td>{{$class->classroom->name}}</td>
                                    <td>
                                        @if($class->day == 1)
                                            星期一
                                        @elseif($class->day == 2)
                                            星期二
                                        @elseif($class->day == 3)
                                            星期三
                                        @elseif($class->day == 4)
                                            星期四
                                        @elseif($class->day == 5)
                                            星期五
                                        @endif
                                    </td>
                                    <td>{{date('H:i',strtotime($class->start_time))}}</td>
                                    <td>{{date('H:i',strtotime($class->end_time))}}</td>
                                    <td>{{$class->borrower}}</td>
                                    <td>
                                        <a href='{{URL("/admin/semester_class_edit/$class->id")}}' title="修改">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <form style="display:inline-block" action='{{URL("/admin/semester_class_delete/$class->id")}}' method="post">
                                            {{csrf_field()}}
                                            <button class="glyphicon glyphicon-trash delete_btn"  title="刪除">
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> 
                </div>
                <div role="tabpanel" class="tab-pane custom_adcontent" id="create">
                    @include('admin.semester_class_add')
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('#roomManage a[href="#{{count($errors)>0?"create":"view"}}"]').tab('show')
    })
    @if(count($errors)>0)
    $('#startHour')[0].value ="{{old('startHour')}}";
    $('#startMin')[0].value ="{{old('startMin')}}";
    $('#endHour')[0].value ="{{old('endHour')}}";
    $('#endMin')[0].value ="{{old('endMin')}}";
    $('#classroom_id')[0].value ="{{old('classroom_id')}}";
    $('#day')[0].value = "{{old('day')}}";
    $('#semester_id')[0].value = "{{old('semester_id')}}";
    @endif
</script>
@endsection
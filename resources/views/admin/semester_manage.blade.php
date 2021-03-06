@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('layouts.admin')
    </div> 
    <!-- Tab panes -->
    <div class="col-md-9">
        <div class="custom_adnav">
            <div class="usrcontent">學期資料管理</div>
            <div class="custom_seperator"></div></br>
            <ul class="nav nav-tabs" id="roomManage" role="tablist">
                <li role="presentation" class="active">
                    <a href="#view" aria-controls="view" role="tab" data-toggle="tab">檢視</a>
                </li>
                <li role="presentation">
                    <a href="#create" aria-controls="create" role="tab" data-toggle="tab">新增</a>
                </li>
            </ul>        
            <div class="tab-content"> 
                <div role="tabpanel" class="tab-pane custom_adcontent active" id="view">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>學年度</th>
                                    <th>學期</th>
                                    <th>開始日期</th>
                                    <th>結束日期</th>
                                    <th>管理</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($semesters as $semester)
                                <tr>
                                    <td>{{$semester->year}}</td>
                                    <td>{{$semester->semester == 1 ? '上學期': '下學期'}}</td>
                                    <td>{{$semester->start_date}}</td>
                                    <td>{{$semester->end_date}}</td>
                                    <td>
                                        <a href='{{URL("/admin/semester_edit/$semester->id")}}' title="修改">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <form style="display:inline-block" action='{{URL("/admin/semester_delete/$semester->id")}}' method="post">
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
                    @include('admin.semester_add')
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('#roomManage a[href="#{{count($errors)>0?"create":"view"}}"]').tab('show')
    })
    
</script>
@endsection
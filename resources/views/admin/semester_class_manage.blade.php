@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('layouts.admin')
    </div> 
    <!-- Tab panes -->
    <div class="col-md-9">
        <div class="custom_adnav">
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
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>學年度</th>
                                <th>課程名稱</th>
                                <th>開始時間</th>
                                <th>結束時間</th>
                                <th>上課教師</th>
                                <th>管理</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>
                </div> 
                <div role="tabpanel" class="tab-pane custom_adcontent" id="create">
                    @include('admin.semester_class_add')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
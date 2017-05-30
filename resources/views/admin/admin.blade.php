@extends('layouts.master')

@section('content')

<div class="row" style="margin:0 auto">
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-default card">
            <div class="panel-heading">待審核預約</div>
            <div class="panel-body" >
                <h2 class="card_title">待審核預約</h2>
                <p>此區可檢視與審核使用者教室預約情形</p>
                <a href="{{URL('/admin/room_reserve_manage')}}" class="btn btn-primary card_button">前往</a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-default card">
            <div class="panel-heading">未歸還設備教室</div>
            <div class="panel-body" >
                <h2 class="card_title">未歸還設備教室</h2>
                <p>此區可檢視尚未歸還的教室,設備與借用人的資訊</p>
                <a href="{{URL('/admin/not_returned')}}" class="btn btn-primary card_button">前往</a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-default card">
            <div class="panel-heading">已審核預約</div>
            <div class="panel-body" >
                <h2 class="card_title">已審核預約</h2>
                <p>此區可檢視已審核過之預約記錄</p>
                <a href="{{URL('/admin/room_reserve_completed')}}" class="btn btn-primary card_button">前往</a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-default card">
            <div class="panel-heading">教室管理</div>
            <div class="panel-body" >
                <h2 class="card_title">教室管理</h2>
                <p>此區可新增修改資管系所擁有之教室</p>
                <a href="{{URL('/admin/room_manage')}}" class="btn btn-primary card_button">前往</a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-default card">
            <div class="panel-heading">設備管理</div>
            <div class="panel-body" >
                <h2 class="card_title">設備管理</h2>
                <p>此區可新增修改資管系所擁有之設備</p>
                <a href="{{URL('/admin/equipment_manage')}}" class="btn btn-primary card_button">前往</a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-default card">
            <div class="panel-heading">學期資料管理</div>
            <div class="panel-body" >
                <h2 class="card_title">學期資料管理</h2>
                <p>此區可新增修改學期資料,學期開始與結束的時間</p>
                <a href="{{URL('/admin/semester_manage')}}" class="btn btn-primary card_button">前往</a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-default card">
            <div class="panel-heading">學期課程管理</div>
            <div class="panel-body" >
                <h2 class="card_title">學期課程管理</h2>
                <p>此區可新增修改學期間的固定課程資料,並將課程資料加入教室租借列表中</p>
                <a href="{{URL('/admin/semester_class_manage')}}" class="btn btn-primary card_button">前往</a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-default card">
            <div class="panel-heading">教室借用紀錄</div>
            <div class="panel-body" >
                <h2 class="card_title">教室借用紀錄</h2>
                <p>此區可檢視教室借用歷史紀錄</p>
                <a href="{{URL('/admin/classroom_history')}}" class="btn btn-primary card_button">前往</a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-default card">
            <div class="panel-heading">設備借用紀錄</div>
            <div class="panel-body" >
                <h2 class="card_title">設備借用紀錄</h2>
                <p>此區可檢視設備借用歷史紀錄</p>
                <a href="{{URL('/admin/equipment_history')}}" class="btn btn-primary card_button">前往</a>
            </div>
        </div>
    </div>
</div>

@endsection
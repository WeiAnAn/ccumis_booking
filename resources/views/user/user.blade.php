@extends('layouts.master')

@section('content')

<div class="row" style="margin:0 auto">
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-default card">
            <div class="panel-heading">歸還設備教室</div>
            <div class="panel-body" >
                <h2 class="card_title">歸還設備教室</h2>
                <p>此區可<strong class="text-danger">歸還</strong>與檢視尚未歸還的教室,設備</p>
                <a href="{{URL('/user/not_returned')}}" class="btn btn-primary card_button">前往歸還</a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-default card">
            <div class="panel-heading">教室借用</div>
            <div class="panel-body" >
                <h2 class="card_title">教室借用</h2>
                <p>此區可借用上課教室與自行預約教室</p>
                <a href="{{URL('/user/room_borrow')}}" class="btn btn-primary card_button">前往</a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-default card">
            <div class="panel-heading">教室預約</div>
            <div class="panel-body" >
                <h2 class="card_title">教室預約</h2>
                <p>此區可預約日後預借的教室,並交由管理員審核過後即可租借</p>
                <a href="{{URL('/user/room_reserve')}}" class="btn btn-primary card_button">前往</a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-default card">
            <div class="panel-heading">設備借用</div>
            <div class="panel-body" >
                <h2 class="card_title">設備借用</h2>
                <p>此區可借用設備器材,投影筆,推車等等</p>
                <a href="{{URL('/user/equipment_borrow')}}" class="btn btn-primary card_button">前往</a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-default card">
            <div class="panel-heading">教室預約紀錄</div>
            <div class="panel-body" >
                <h2 class="card_title">教室預約記錄</h2>
                <p>檢視正在審核與審核完的預約記錄</p>
                <a href="{{URL('/user/review_reserve')}}" class="btn btn-primary card_button">前往</a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-default card">
            <div class="panel-heading">教室借用紀錄</div>
            <div class="panel-body" >
                <h2 class="card_title">教室借用紀錄</h2>
                <p>此區可檢視教室借用歷史紀錄</p>
                <a href="{{URL('/user/classroom_history')}}" class="btn btn-primary card_button">前往</a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-default card">
            <div class="panel-heading">設備借用紀錄</div>
            <div class="panel-body" >
                <h2 class="card_title">設備借用紀錄</h2>
                <p>此區可檢視設備借用歷史紀錄</p>
                <a href="{{URL('/user/equipment_history')}}" class="btn btn-primary card_button">前往</a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-default card">
            <div class="panel-heading">修改個人資料</div>
            <div class="panel-body" >
                <h2 class="card_title">修改個人資料</h2>
                <p>此區可修改個人資料,如電話,密碼</p>
                <a href="{{URL('/user/edit')}}" class="btn btn-primary card_button">前往</a>
            </div>
        </div>
    </div>
</div>

@endsection
@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('layouts.user')
    </div> 
    <!-- Tab panes -->
    <div class="col-md-8">
        <div class="usrcontent">修改個人資料</div>
        <div class="custom_seperator"></div>
        <br>
        <form action="{{URL('/admin/user_update/'.$id)}}"  method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="username">學號</label>
                <input type="text" class="form-control" id="username" value="{{$username}}" disabled>
            </div>
            <div class="form-group">
                <label for="password">密碼</label>
                @if($errors->has('password'))
                <p class="text-danger">
                    <strong>{{ $errors->first('password') }}</strong>
                </p>
                @endif
                <input type="password" class="form-control" name="password" id="password" >
            </div>
            <div class="form-group">
                <label for="password_confirmation">密碼確認</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" >
            </div>
            <div class="form-group">
                <label for="name">姓名</label>
                @if($errors->has('name'))
                <p class="text-danger">
                    <strong>{{ $errors->first('name') }}</strong>
                </p>
                @endif
                <input type="text" class="form-control" name="name" id="name" required value="{{$name}}">
            </div>
            <div class="form-group">
                <label for="phone">電話</label>
                @if($errors->has('phone'))
                <p class="text-danger">
                    <strong>{{ $errors->first('phone') }}</strong>
                </p>
                @endif
                <input type="text" class="form-control" name="phone" id="phone" required value="{{$phone}}">
            </div>
            <button type="submit" class="btn btn-default">送出</button>
    </div>
</div>

@endsection

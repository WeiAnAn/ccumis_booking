@extends('layouts.master')

@section('content')
    <div>
        <h2>註冊</h2>
        <form action="{{URL('/register')}}"  method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="username">學號</label>
                @if($errors->has('username'))
                <p class="text-danger">
                    <strong>{{ $errors->first('username') }}</strong>
                </p>
                @endif
                <input type="text" class="form-control" name="username" id="username" required value="{{old('username')}}">
            </div>
            <div class="form-group">
                <label for="password">密碼</label>
                @if($errors->has('password'))
                <p class="text-danger">
                    <strong>{{ $errors->first('password') }}</strong>
                </p>
                @endif
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">密碼確認</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
            </div>
            <div class="form-group">
                <label for="name">姓名</label>
                @if($errors->has('name'))
                <p class="text-danger">
                    <strong>{{ $errors->first('name') }}</strong>
                </p>
                @endif
                <input type="text" class="form-control" name="name" id="name" required value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label for="phone">電話</label>
                @if($errors->has('phone'))
                <p class="text-danger">
                    <strong>{{ $errors->first('phone') }}</strong>
                </p>
                @endif
                <input type="text" class="form-control" name="phone" id="phone" required value="{{old('phone')}}">
            </div>
            <button type="submit" class="btn btn-default">送出</button>
        </form>
    </div>
@endsection
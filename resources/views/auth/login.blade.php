@extends('layouts.master')

@section('content')
    <div>
        <h2>登入</h2>
        <form action="{{URL('/login')}}"  method="post">
            {{ csrf_field() }}
            @if($errors->count()>0)
            <p class="text-danger">
                <strong>帳號或密碼錯誤</strong>
            </p>
            @endif
            <div class="form-group">
                <label for="username">學號</label>
                <input type="text" class="form-control" name="username" id="username" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">密碼</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <button type="submit" class="btn btn-default">送出</button>
        </form>
    </div>
@endsection

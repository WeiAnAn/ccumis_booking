@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('layouts.admin')
    </div> 
    <!-- Tab panes -->
    <div class="col-md-8">
        <div class="custom_adnav">
            <div class="usrcontent">學生管理</div>
            <div class="custom_seperator"></div></br>
            <ul class="nav nav-tabs" id="user" role="tablist">
                <li role="presentation">
                    <a href="#view" aria-controls="view" role="tab" data-toggle="tab">檢視</a>
                </li>
                <li role="presentation">
                    <a href="#create" aria-controls="create" role="tab" data-toggle="tab">新增</a>
                </li>
                <li><a href="{{url('/admin/user_upload')}}">批次上傳</a></li>
            </ul>        
            <div class="tab-content"> 
                <div role="tabpanel" class="tab-pane custom_adcontent" id="view">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>學號</th>
                                    <th>姓名</th>
                                    <th>手機</th>
                                    <th>管理</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>
                                        <a href='{{URL("/admin/user_edit/$user->id")}}' title="修改">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <form style="display:inline-block" action='{{URL("/admin/user_delete/$user->id")}}' method="post">
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
                <form action="{{URL('/admin/user_add')}}"  method="post">
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
            </div>
            {{$users->links()}}
        </div>
    </div>
</div>

<script>
    $(function () {
        $('#user a[href="#{{count($errors)>0?"create":"view"}}"]').tab('show')
    })
</script>
@endsection

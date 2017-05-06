@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('layouts.admin')
    </div> 
    <!-- Tab panes -->
    <div class="col-md-8">
        <div class="custom_adnav">
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
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>教室</th>
                                <th>容納人數</th>
                                <th>管理</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>119</td>
                                <td>119</td>
                                <td>
                                    <a href="{{URL('/admin/roomUpdate')}}" title="修改">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    <a href="{{URL('/admin/roomDelete')}}" title="刪除">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>221</td>
                                <td>221</td>
                                <td>
                                    <a href="{{URL('/admin/roomUpdate')}}" title="修改">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    <a href="{{URL('/admin/roomDelete')}}" title="刪除">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> 
                <div role="tabpanel" class="tab-pane custom_adcontent" id="create">
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="roomName">教室名稱</label>
                            <input type="text" class="form-control" id="roomName" placeholder="room">
                        </div>
                        <div class="form-group">
                            <label for="numberOfpeople">容納人數</label>
                            <input type="text" class="form-control" id="numberOfpeople" placeholder="people">
                        </div>
                        <button type="submit" class="btn btn-primary">新增</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  $(function () {
          $('#roomManage a:first').tab('show')
            })
</script>
@endsection

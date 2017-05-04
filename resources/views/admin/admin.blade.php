@extends('layouts.master')

@section('content')
<!-- Nav tabs -->
<ul class="nav nav-stacked nav-pills custom_adposition" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#room_record" role="tab">教室借閱紀錄</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#room_manage" role="tab">教室管理</a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content custom_adtabContent">
    <div class="tab-pane" id="room_record" role="tabpanel">
        <nav class="navbar navbar-default custom_adnavbar">
            <div class="container-fluid">
                <form class="navbar-form navbar-left">
                    <div class="form-group">
                        <input type="text" class="form-control custom_adinput" placeholder="Search">
                    </div>
                    <label>
                        教室
                        <select name="classroom" class="custom_adselect">
                            <option value="119">119</option>
                            <option value="221">221</option>
                            <option value="349">349</option>
                            <option value="608">608</option>
                            <option value="616a">616a</option>
                            <option value="616b">616b</option>
                        </select>
                    </label>
                    <button type="submit" class="btn btn-default custom_adbtn">搜尋紀錄</button>
                    <button type="reset" class="btn btn-default custom_adbtn">清除紀錄</button>
                </form>
            </div><!-- /.container-fluid -->
        </nav>    
    </div>
    <div class="tab-pane custom_adtable" id="room_manage" role="tabpanel">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>教室</th>
                    <th>管理</th>
                </tr>
            </thead>
            <tbody>
                <tr>
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
</div>

<script>
  $(function () {
          $('#myTab a:first').tab('show')
            })
  </script>
@endsection

@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('layouts.admin')
    </div> 
    <!-- Tab panes -->
    <div class="col-md-8">
        <div class="custom_adnav">
            <h1 style="margin-top:10px">待審核預約</h1>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>教室</th>
                            <th>日期</th>
                            <th>時間</th>
                            <th>類型</th>
                            <th>借用人</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($records as $record)
                        <tr>
                            <td>{{$record->classroom->name}}</td>
                            <td>{{$record->date}}</td>
                            <td>
                                {{date('H:i',strtotime($record->start_time))}} ~
                                {{date('H:i',strtotime($record->end_time))}}
                            </td>
                            <td>
                                @if($record->type == 1)
                                    上課
                                @elseif($record->type == 2)
                                    考試
                                @elseif($record->type == 3)
                                    會議
                                @elseif($record->type == 4)
                                    活動
                                @endif
                            </td>
                            <td>{{$record->user->name}}</td>
                            <td>
                                <form style="display:inline-block" action='{{URL("/admin/room_reserve_accept/$record->id")}}' method="post">
                                    {{csrf_field()}}
                                    <button class="glyphicon glyphicon-ok delete_btn"  title="同意">
                                    </button>
                                </form>
                                <button class="glyphicon glyphicon-remove delete_btn"  title="拒絕" onclick="showRejectForm()">
                                    </button>
                                <form style="display:none" action='{{URL("/admin/room_reserve_reject/$record->id")}}' method="post" id="rejectForm">
                                    {{csrf_field()}}
                                    <input type="text" class="form-control" name="reason" placeholder="拒絕原因">
                                    <button class="btn btn-danger">送出</button>
                                    <button class="btn btn-primary" onclick="cancel(event)">取消</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('#roomManage a:first').tab('show')
    })
    function showRejectForm(){
        $('#rejectForm').css('display','inline-block');
    }
    function cancel(event){
        event.preventDefault();
        $('#rejectForm').css('display','none');
    }
</script>
@endsection

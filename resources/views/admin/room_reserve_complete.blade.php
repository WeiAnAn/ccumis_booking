@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('layouts.admin')
    </div> 
    <!-- Tab panes -->
    <div class="col-md-9">
        <div class="custom_adnav">
            <h1 style="margin-top:10px">已審核預約</h1>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>教室</th>
                            <th>日期</th>
                            <th>時間</th>
                            <th>類型</th>
                            <th>借用人</th>
                            <th>審核結果</th>
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
                                @if($record->status == 1)
                                    通過
                                @elseif($record->status == -1)
                                    拒絕,原因:{{$record->reason}}
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$records->links()}}
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

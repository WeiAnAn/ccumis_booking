@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('layouts.user')
    </div> 
    <!-- Tab panes -->
    <div class="tab-content col-md-9">

        <div class="usrcontent">審核中預約</div>
        <div class="custom_seperator"></div>

        <div class="booking-classroom table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>  
                        <th>教室</th>
                        <th>日期</th>
                        <th>時間</th>
                        <th>課程名稱</th>
                        <th>類型</th>
                        <th>借用人</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($activeRecords as $record)
                    <tr>
                        <td>{{$record->classroom->name}}</td>
                        <td>{{$record->date}}</td>
                        <td>
                            {{date('H:i',strtotime($record->start_time))}} ~
                            {{date('H:i',strtotime($record->end_time))}}
                        </td>
                        <td>{{$record->name}}</td>
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
                        <td>{{$record->borrower}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="usrcontent">已審核預約</div>
        <div class="custom_seperator"></div>
        
        <div class="booking-classroom table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>  
                        <th>教室</th>
                        <th>日期</th>
                        <th>時間</th>
                        <th>課程名稱</th>
                        <th>類型</th>
                        <th>借用人</th>
                        <th>狀態</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($completedRecords as $record)
                    <tr>
                        <td>{{$record->classroom->name}}</td>
                        <td>{{$record->date}}</td>
                        <td>
                            {{date('H:i',strtotime($record->start_time))}} ~
                            {{date('H:i',strtotime($record->end_time))}}
                        </td>
                        <td>{{$record->name}}</td>
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
                        <td>{{$record->borrower}}</td>
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
            {{$completedRecords->links()}}
        </div>
            
    </div><!--end of tab-content col-md-8-->

</div>    

@endsection    

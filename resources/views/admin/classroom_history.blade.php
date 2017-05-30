@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('layouts.admin')
    </div> 
    <!-- Tab panes -->
    <div class="tab-content col-md-9">

        <div class="usrcontent">教室借用紀錄</div>
        <div class="custom_seperator"></div>

        <div class="booking-classroom table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>  
                        <th>教室</th>
                        <th>日期</th>
                        <th>時間</th>
                        <th>課程名稱</th>
                        <th>借用人</th>
                        <th>電話</th>
                        <th>借用時間</th>
                        <th>歸還時間</th>
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
                        <td>{{$record->name}}</td>
                        <td>{{$record->user->name}}</td>
                        <td>{{$record->user->phone}}</td>
                        <td>{{date('Y-m-d H:i', strtotime($record->borrow_datetime))}}</td>
                        <td>{{date('Y-m-d H:i', strtotime($record->return_datetime))}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$records->links()}}
        </div>
            
    </div><!--end of tab-content col-md-8-->

</div>    

@endsection    

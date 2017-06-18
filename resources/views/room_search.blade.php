@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-2">
    </div> 
    <div class="col-md-8">
        <div class="tab-pane" id="room_record" role="tabpanel">
            <nav class="navbar navbar-default custom_adnavbar">
                <div class="container-fluid">
                    <form class="navbar-form navbar-left" action="{{url('/search_record')}}">
                        <div class="form-group">
                            <input type="text" class="form-control custom_adinput" name="name" placeholder="Search">
                        </div>
                        <label>
                            教室
                            <select name="classroom_id" class="custom_adselect" id="classroom_id">
                                <option value=""></option>
                                @foreach($classrooms as $classroom)
                                <option value="{{$classroom->id}}">{{$classroom->name}}</option>
                                @endforeach
                            </select>
                        </label>
                        <button type="submit" class="btn btn-default custom_adbtn">搜尋紀錄</button>
                    </from>
                </div><!-- /.container-fluid -->
            </nav>
            @if(isset($records))
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <td>教室</td>
                        <td>日期</td>
                        <td>時間</td>
                        <td>課程名稱</td>
                        <td>借用人</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($records as $record)
                    <tr>
                        <td>{{$record->classroom->name}}</td>
                        <td>{{$record->date}}</td>
                        <td>{{date('H:i', strtotime($record->start_time))}}~{{date('H:i', strtotime($record->end_time))}}</td>
                        <td>{{$record->name}}</td>
                        <td>{{$record->borrower}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$records->links()}}
            @endif
        </div>
    </div>
</div>


@endsection    

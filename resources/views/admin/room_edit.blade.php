@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('layouts.admin')
    </div> 
    <!-- Tab panes -->
    <div class="col-md-8">
        <form action='{{URL("/admin/room_update/$classroom->id")}}' method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="roomName">教室名稱</label>
                <input type="text" class="form-control" id="roomName"  name="name" placeholder="room" value="{{$classroom->name}}">
            </div>
            <div class="form-group">
                <label for="numberOfpeople">容納人數</label>
                <input type="text" class="form-control" id="numberOfpeople" name="count" placeholder="people" value="{{$classroom->count}}">
            </div>
            <button type="submit" class="btn btn-primary">更新</button>
        </form>
    </div>
</div>

@endsection

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
                @if($errors->has('name'))
                <p class="text-danger"><strong>{{$errors->first('name')}}</strong></p>
                @endif
                <input type="text" class="form-control" id="roomName"  name="name" placeholder="room" value="{{$classroom->name}}" required>
            </div>
            <div class="form-group">
                <label for="numberOfpeople">容納人數</label>
                @if($errors->has('count'))
                <p class="text-danger"><strong>{{$errors->first('count')}}</strong></p>
                @endif
                <input type="text" class="form-control" id="numberOfpeople" name="count" placeholder="people" value="{{$classroom->count}}" required>
            </div>
            <button type="submit" class="btn btn-primary">更新</button>
        </form>
    </div>
</div>

@endsection

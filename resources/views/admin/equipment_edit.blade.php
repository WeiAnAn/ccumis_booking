@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('layouts.admin')
    </div> 
    <!-- Tab panes -->
    <div class="col-md-9">
        <form action='{{URL("/admin/equipment_update/$id")}}' method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="equipmentName">設備名稱</label>
                <input type="text" class="form-control" id="equipmentName"  name="name" required value="{{$name}}">
            </div>
            <div class="form-group">
                <label for="number">數量</label>
                <input type="number" min="1" class="form-control" id="number" name="count" required value="{{$total}}">
            </div>
            <button type="submit" class="btn btn-primary">修改</button>
        </form>
    </div>
</div>

@endsection

@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('layouts.user')
    </div> 
    <!-- Tab panes -->
    <div class="tab-content col-md-9">

        <div class="usrcontent">設備借用紀錄</div>
        <div class="custom_seperator"></div>

        <div class="booking-classroom table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>  
                        <th>設備名稱</th>
                        <th>數量</th>
                        <th>借用時間</th>
                        <th>歸還時間</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($equipment as $item)
                    <tr>
                        <td>{{$item->equipment->name}}</td>
                        <td>{{$item->count}}</td>
                        <td>{{date('Y-m-d H:i', strtotime($item->borrow_datetime))}}</td>
                        <td>{{date('Y-m-d H:i', strtotime($item->return_datetime))}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$equipment->links()}}
        </div>
            
    </div><!--end of tab-content col-md-8-->

</div>    

@endsection    
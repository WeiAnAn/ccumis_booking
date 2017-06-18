@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('layouts.admin')
    </div> 
    <!-- Tab panes -->
    <div class="col-md-8">
        <div class="custom_adnav">
            <div class="usrcontent">學生資料上傳</div>
            <div class="custom_seperator"></div></br>
            @if(count($errors)>0)
            <div class="alert alert-danger" role="alert">
                @foreach($errors->all() as $error)
                    <p><strong>{{$error}}</strong></p>
                @endforeach
            </div>
            @endif
            <form action="{{url('/admin/user_upload')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="file" name="file">
                <br>
                <button class="btn btn-primary">送出</button>
            </form>
            
        </div>
    </div>
</div>
@endsection

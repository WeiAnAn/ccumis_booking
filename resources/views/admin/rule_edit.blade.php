@extends('layouts.master')

@section('header')
    <script src="{{asset('js/summernote.min.js')}}"></script>
    <script src="{{asset('js/summernote-zh-TW.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/summernote.css')}}"/>
@endsection

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('layouts.admin')
    </div> 
    <!-- Tab panes -->
    <div class="col-md-9">
        <div class="custom_adnav">
            <div class="usrcontent">使用規範修改</div>
            <div class="custom_seperator"></div></br>
            
            <div id="editor">
                {!! $content !!}
            </div>
            <form action="{{URL('/admin/rule_update')}}" method="post">
                {{csrf_field()}}
                <textarea name="content" id="content" hidden></textarea>
                <button onclick="copyText()" class="btn btn-primary">修改</button>
            </form>
        </div>
    </div>
</div>
<script>
    
    $(document).ready(function() {
        $('#editor').summernote({
            lang: 'zh-TW',
            height: 300,
        });
    });
    function copyText(){
        document.getElementById('content').innerHTML = $('#editor').summernote('code');
    }
</script>
@endsection
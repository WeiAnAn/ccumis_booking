<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>國立中正大學資管系 教室借用系統</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom_base.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom_admin.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{'css/bootstrap-datepicker.min.css'}}">
    
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-datepicker.zh-TW.min.js')}}"></script>
    <script src="{{asset('js/moment.js')}}"></script>
</head>
<body>
    <div class="wrapper">
        @include('layouts.nav')
        <div class="container">
            @yield('content')
        </div>
        @include('layouts.footer')
    </div>
</body>
</html>

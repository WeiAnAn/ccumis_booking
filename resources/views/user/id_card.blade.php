@extends('layouts.master')

@section('header')
    <script src="{{asset('js/serial.js')}}"></script>
@endsection

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('layouts.user')
    </div> 
    <!-- Tab panes -->
    <div class="col-md-8">
        <div class="usrcontent">登錄學生證號</div>
        <div class="custom_seperator"></div>
        <br>
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{session('success')}}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div>
            <p id="information" class="text-danger"></p>
            <button id="connect" class="btn btn-default">連接讀卡機</button>
        </div>
        <form action="{{URL('/user/id_card')}}"  method="post" id="form">
            {{ csrf_field() }}
            <input type="password" name="id_card" id="id_card" hidden>
        </form>
    </div>
</div>
<script>
    var information = document.getElementById('information');
    var connectButton = document.getElementById('connect');
    var form = document.getElementById('form');
    var cardInput = document.getElementById('id_card');
    var port;
    if(/Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor)){

        document.addEventListener('DOMContentLoaded', event => {
            function connect() {
                port.connect().then(() => {
                    console.log(port);
                    information.innerText = '請嗶卡';
                    connectButton.textContent = '已連接';
                    port.onReceive = data => {
                        let textDecoder = new TextDecoder();
                        cardInput.value = textDecoder.decode(data);
                        port.disconnect().then(() => {
                            form.submit();
                        });
                    }
                    port.onReceiveError = error => {
                        console.log('Receive error: ' + error);
                    };
                }, error => {
                    console.log('Connection error: ' + error);
                });
            };

            connectButton.addEventListener('click', function() {
                if (port) {
                    // port.disconnect();
                    // connectButton.textContent = 'Connect';
                } else {
                    serial.requestPort().then(selectedPort => {
                        port = selectedPort;
                        connect();
                    }).catch(error => {
                        console.log('Connection error: ' + error);
                    });
                }
            });

            serial.getPorts().then(ports => {
                if (ports.length == 0) {
                    information.innerText = "沒有找到讀卡機請連接讀卡機及點選連接讀卡機！";
                } else {
                    port = ports[0];
                    connect();
                }
            });
        });
    } else {
        information.innerText = "請使用Chrome";
    }
</script>
@endsection

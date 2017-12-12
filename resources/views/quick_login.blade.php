@extends('layouts.master')

@section('header')
    <script src="{{asset('js/serial.js')}}"></script>
@endsection

@section('content')
    <div>
        <h2>快速登入</h2>
        @if(session('error'))
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{session('error')}}
        </div>
        @endif
        <div>
            <p id="information" class="text-danger"></p>
            <button id="connect" class="btn btn-default">連接讀卡機</button>
        </div>
        <form action="{{URL('/quick_login')}}"  method="post" id="form">
            {{ csrf_field() }}
            @if($errors->count()>0)
            <p class="text-danger">
                <strong>無效的卡片或是還未註冊的卡片，請先登入註冊卡片</strong>
            </p>
            @endif
            <input type="text" hidden name="id_card" id="id_card">
        </form>
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
                            console.log(textDecoder.decode(data));
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

@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div id="datepicker"></div>
            <input type="hidden" id="my_hidden_input">
        </div>
        <div class="col-md-9">
            <div id="booking-table">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>教室</th>
                            <th>時間</th>
                            <th>課程名稱</th>
                            <th>借用人</th>
                            <th>時數</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>123</td>
                        <td>123</td>
                        <td>123</td>
                        <td>123</td>
                        <td>123</td>
                    </tr>
                    <tr>
                        <td>123</td>
                        <td>123</td>
                        <td>123</td>
                        <td>123</td>
                        <td>123</td>
                    </tr>
                    <tr>
                        <td>123</td>
                        <td>123</td>
                        <td>123</td>
                        <td>321</td>
                        <td>123</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


    <script>
        $('#datepicker').datepicker({
            format: "yyyy-mm-dd",
            language: "zh-TW",
            todayHighlight: true,
        });
        console.log(moment().format('YYYY-MM-DD'))
        $('#datepicker').on("changeDate", function() {
            $('#my_hidden_input').val(
                $('#datepicker').datepicker('getFormattedDate')
            );
        });
        $('#datepicker').datepicker('setDate', moment().format('YYYY-MM-DD'))
    </script>
@endsection

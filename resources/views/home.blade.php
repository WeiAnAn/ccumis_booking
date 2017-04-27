@extends('layouts.master')

@section('content')
    <div class="row">
        <div id="datepicker"></div>
        <input type="hidden" id="my_hidden_input">
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

@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-3 datepicker">
            <div id="datepicker"></div>
            <input type="hidden" id="my_hidden_input">
        </div>
        <div class="col-md-9">
            <div id="booking-table" class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>教室</th>
                            <th>開始時間</th>
                            <th>結束時間</th>
                            <th>課程名稱</th>
                            <th>借用人</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        
                    </tbody>
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
        $('#datepicker').on("changeDate", function() {
            $.ajax({
                url: "{{URL('/api/getClass')}}",
                data: { date: $('#datepicker').datepicker('getFormattedDate')}
            }).done(function(json){
                var data = JSON.parse(json);
                var content = data.map(function(item){
                    var row = "";
                    row = "<tr>";
                    row+= "<td>"+item.classroom.name+"</td>";
                    row+= "<td>"+moment(item.start_time,"HH:mm:ss").format("HH:mm")+"</td>";
                    row+= "<td>"+moment(item.end_time,"HH:mm:ss").format("HH:mm")+"</td>";
                    row+= "<td>"+item.name+"</td>";
                    row+= "<td>"+item.borrower+"</td>";
                    row+= "</tr>";
                    return row;
                }).reduce(function(now, next){
                    return now+next;
                },"");
                $('#tbody').html(content);
            })
        });
        $('#datepicker').datepicker('setDate', moment().format('YYYY-MM-DD'))
        
    </script>
@endsection

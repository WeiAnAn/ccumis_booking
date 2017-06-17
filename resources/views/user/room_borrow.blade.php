@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('layouts.user')
    </div> 
    <!-- Tab panes -->
    <div class="tab-content col-md-9">
        <div class="usrcontent">教室借用</div>
        <div class="custom_seperator"></div>
        <div class='input-group' style="margin-top:12px">
            <label for="">日期</label>
            <input type="text" class="form-control datepicker" id="datepicker" name="date" >
        </div>
        <div class="booking-classroom table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>  
                        <th>教室</th>
                        <th>日期</th>
                        <th>時間</th>
                        <th>課程名稱</th>
                        <th>借用人</th>
                        <th>借用</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                
                </tbody>
            </table>
        </div>
    </div><!--end of tab-content col-md-8-->
</div>    

<script>
    $('#datepicker').datepicker({
        format: "yyyy-mm-dd",
        language: "zh-TW",
        todayHighlight: true,
        autoclose: true
    });
    $('#datepicker').on("changeDate", function() {
        $.ajax({
            url: "{{URL('/getBorrowClass')}}",
            data: { date: $('#datepicker').datepicker('getFormattedDate')}
        }).done(function(json){
            var data = JSON.parse(json);
            var url = document.URL;
            url = url.substr(0, url.indexOf('user'));
            var content = data.map(function(item){
                var row = "";
                row = "<tr>";
                row+= "<td>"+item.classroom.name+"</td>";
                row+= "<td>"+item.date+"</td>";
                row+= "<td>"+moment(item.start_time,"HH:mm:ss").format("HH:mm")+"~"+moment(item.end_time,"HH:mm:ss").format("HH:mm")+"</td>";
                row+= "<td>"+item.name+"</td>";
                row+= "<td>"+item.borrower+"</td>";
                row+= "<td>";
                row+= "<form action='"+url+"user/room_borrow_add/"+item.id+"' method='post'>";
                row+= '<input type="text" name="_token" value="'+item._token+'" hidden/>';
                row+= '<button class="btn btn-primary">借用</button>';
                row+= '</form>';
                row+= '</td>';
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

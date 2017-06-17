<!-- Nav -->
<ul class="nav nav-pills nav-stacked custom_adposition visible-lg visible-md">
    <li class="custom_seperator">
        <a href="{{URL('/user/not_returned')}}">歸還教室與設備</a>
    </li>
    <li class="custom_seperator">
        <a href="{{URL('/user/room_borrow')}}">教室借用</a>
    </li>
    <li role="presentation" class="custom_seperator">
        <a href="{{URL('/user/equipment_borrow')}}">設備借用</a>
    </li>
    <li role="presentation" class="custom_seperator" >
        <a href="{{URL('/user/room_reserve')}}">預約教室</a>
    </li>
    <li role="presentation" class="custom_seperator">
        <a href="{{URL('/user/review_reserve')}}">審核中預約</a>
    </li>
    <li class="custom_seperator">
        <a href="{{URL('/user/classroom_history')}}">教室借用歷史紀錄</a>
    </li>
    <li class="custom_seperator">
        <a href="{{URL('/user/equipment_history')}}">設備借用歷史紀錄</a>
    </li>
</ul>

<div class="panel panel-default hidden-lg hidden-md">
    <div class="panel-heading" role="tab" id="tab" onclick="collapse()">
        <h4 class="panel-title">
            <a href="#collapse" role="button" data-toggle="collapse" 
                aria-expanded="false" aria-controls="collapse">功能選單</a>
        </h4>
    </div>
    <div class="panel-collapse collapse" role="tabpanel" id="collapse" 
        aria-labelledby="tab" aria-expanded="false">
        <ul class="list-group">
            <a class="list-group-item" href="{{URL('/user/not_returned')}}">歸還教室與設備</a>
            <a class="list-group-item" href="{{URL('/user/room_borrow')}}">教室借用</a>
            <a class="list-group-item" href="{{URL('/user/equipment_borrow')}}">設備借用</a>
            <a class="list-group-item" href="{{URL('/user/room_reserve')}}">預約教室</a>
            <a class="list-group-item" href="{{URL('/user/review_reserve')}}">審核中預約</a>
            <a class="list-group-item" href="{{URL('/user/classroom_history')}}">教室借用歷史紀錄</a>
            <a class="list-group-item" href="{{URL('/user/equipment_history')}}">設備借用歷史紀錄</a>
        </ul>
    </div>
</div>

<script>
$('.nav-pills li').click( function() {
      $('.nav-pills li').removeClass('active');
      $(this).addClass('active');
});

function collapse(){
    $('#collapse').collapse('toggle');
}
</script>

<!-- Nav -->
<ul class="nav nav-pills nav-stacked custom_adposition">
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

<script>
$('.nav-pills li').click( function() {
      $('.nav-pills li').removeClass('active');
      $(this).addClass('active');
});
</script>

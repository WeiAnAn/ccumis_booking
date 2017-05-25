<!-- Nav -->
<ul class="nav nav-pills nav-stacked custom_adposition">
    <li role="presentation" class="custom_seperator" >
        <a href="{{URL('/user/room_reserve')}}">預約教室</a>
    </li>
    <li role="presentation" class="custom_seperator">
        <a href="{{URL('/user/equipment_reserve')}}">預約設備</a>
    </li>
    <li role="presentation" class="custom_seperator">
        <a href="{{URL('/user/review_reserve')}}">審核中預約</a>
    </li>
</ul>

<script>
$('.nav-pills li').click( function() {
      $('.nav-pills li').removeClass('active');
      $(this).addClass('active');
});
</script>

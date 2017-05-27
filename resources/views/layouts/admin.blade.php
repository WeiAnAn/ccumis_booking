<!-- Nav -->
<ul class="nav nav-pills nav-stacked custom_adposition">
    <li role="presentation" class="custom_seperator" >
        <a href="{{URL('/admin/room_record')}}">教室借閱紀錄</a>
    </li>
    <li class="custom_seperator">
        <a href="{{URL('/admin/room_reserve_manage')}}">待審核預約</a>
    </li>
    <li class="custom_seperator">
        <a href="{{URL('/admin/room_reserve_completed')}}">已審核預約</a>
    </li>
    <li role="presentation" class="custom_seperator">
        <a href="{{URL('/admin/room_manage')}}">教室管理</a>
    </li>
    <li class="custom_seperator">
        <a href="{{URL('/admin/semester_manage')}}">學期資料管理</a>
    </li>
    <li>
        <a href="{{URL('/admin/semester_class_manage')}}">學期課程管理</a>
    </li>

</ul>

<script>
$('.nav-pills li').click( function() {
      $('.navpills li').removeClass('active');
      $(this).addClass('active');
});
</script>

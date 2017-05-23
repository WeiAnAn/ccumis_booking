<!-- Nav -->
<ul class="nav nav-pills nav-stacked custom_adposition">
    <li role="presentation" class="custom_seperator" >
        <a href="{{URL('/admin/room_record')}}">教室借閱紀錄</a>
    </li>
    <li role="presentation" class="custom_seperator">
        <a href="{{URL('/admin/room_manage')}}">教室管理</a>
    </li>
    <li>
        <a href="{{URL('/admin/add_semester')}}">新增學期課程資料</a>
    </li>
</ul>

<script>
$('.nav-pills li').click( function() {
      $('.nav-pills li').removeClass('active');
      $(this).addClass('active');
});
</script>

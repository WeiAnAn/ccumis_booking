<!-- Nav -->
<ul class="nav nav-pills nav-stacked custom_adposition visible-lg visible-md">
    <li class="custom_seperator">
        <a href="{{URL('/admin/not_returned')}}">未歸還設備教室</a>
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
    <li role="presentation" class="custom_seperator">
        <a href="{{URL('/admin/equipment_manage')}}">設備管理</a>
    </li>
    <li class="custom_seperator">
        <a href="{{URL('/admin/semester_manage')}}">學期資料管理</a>
    </li>
    <li class="custom_seperator">
        <a href="{{URL('/admin/semester_class_manage')}}">學期課程管理</a>
    </li>
    <li class="custom_seperator">
        <a href="{{URL('/admin/classroom_history')}}">教室借用歷史紀錄</a>
    </li>
    <li class="custom_seperator">
        <a href="{{URL('/admin/equipment_history')}}">設備借用歷史紀錄</a>
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
            <li class="list-group-item">
                <a href="{{URL('/admin/not_returned')}}">未歸還設備教室</a>
            </li>
            <li class="list-group-item">
                <a href="{{URL('/admin/room_reserve_manage')}}">待審核預約</a>
            </li>
            <li class="list-group-item">
                <a href="{{URL('/admin/room_reserve_completed')}}">已審核預約</a>
            </li>
            <li role="presentation" class="list-group-item">
                <a href="{{URL('/admin/room_manage')}}">教室管理</a>
            </li>
            <li role="presentation" class="list-group-item">
                <a href="{{URL('/admin/equipment_manage')}}">設備管理</a>
            </li>
            <li class="list-group-item">
                <a href="{{URL('/admin/semester_manage')}}">學期資料管理</a>
            </li>
            <li class="list-group-item">
                <a href="{{URL('/admin/semester_class_manage')}}">學期課程管理</a>
            </li>
            <li class="list-group-item">
                <a href="{{URL('/admin/classroom_history')}}">教室借用歷史紀錄</a>
            </li>
            <li class="list-group-item">
                <a href="{{URL('/admin/equipment_history')}}">設備借用歷史紀錄</a>
            </li>
        </ul>
    </div>
</div>

<script>
$('.nav-pills li').click( function() {
      $('.navpills li').removeClass('active');
      $(this).addClass('active');
});
function collapse(){
    $('#collapse').collapse('toggle');
}
</script>

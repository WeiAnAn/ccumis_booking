@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('layouts.admin')
    </div> 
    <!-- Tab panes -->
    <div class="col-md-8">
        <div class="custom_adnav">
            <div class="usrcontent">設備管理</div>
            <div class="custom_seperator"></div></br>
            <ul class="nav nav-tabs" id="roomManage" role="tablist">
                <li role="presentation">
                    <a href="#view" aria-controls="view" role="tab" data-toggle="tab">檢視</a>
                </li>
                <li role="presentation">
                    <a href="#create" aria-controls="create" role="tab" data-toggle="tab">新增</a>
                </li>
            </ul>
            <div class="tab-content"> 
                <div role="tabpanel" class="tab-pane custom_adcontent" id="view">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>設備</th>
                                    <th>數量</th>
                                    <th>管理</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($equipments as $equipment)
                                <tr>
                                    <td>{{$equipment->name}}</td>
                                    <td>{{$equipment->total}}</td>
                                    <td>
                                        <a href='{{URL("/admin/equipment_edit/$equipment->id")}}' title="修改">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <form style="display:inline-block" action='{{URL("/admin/equipment_delete/$equipment->id")}}' method="post">
                                            {{csrf_field()}}
                                            <button class="glyphicon glyphicon-trash delete_btn"  title="刪除">
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> 
                <div role="tabpanel" class="tab-pane custom_adcontent" id="create">
                    <form action="{{URL('/admin/equipment_add')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="equipmentName">設備名稱</label>
                            @if($errors->has('name'))
                            <p class="text-danger"><strong>{{$errors->first('name')}}</strong></p>
                            @endif
                            <input type="text" class="form-control" id="equipmentName"  name="name" value="{{old('name')}}" required>
                        </div>
                        <div class="form-group">
                            <label for="number">數量</label>
                            @if($errors->has('count'))
                            <p class="text-danger"><strong>{{$errors->first('count')}}</strong></p>
                            @endif
                            <input type="number" min="1" class="form-control" id="number" name="count" value="{{old('count')}}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">新增</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  $(function () {
          $('#roomManage a[href="#{{count($errors)>0?"create":"view"}}"]').tab('show')
            })
</script>
@endsection

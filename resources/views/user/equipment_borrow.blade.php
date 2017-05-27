@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('layouts.user')
    </div> 
    <!-- Tab panes -->
    <div class="tab-content col-md-9">
        <form action="{{URL('user/equipment_borrow_add')}}" method="post">
            {{csrf_field()}}     
            <div class="usrcontent">選擇設備</div>
            <div class="custom_seperator"></div>
            
            <div class="row">
            @foreach($equipment as $item)
                <div class="col-xs-6 col-md-4 col-lg-3">
                    <div class="checkbox">
                        <label class="equipLabel">
                            <input type="checkbox" class="check" name="equipment_id[]" value="{{$item->id}}">
                            {{$item->name}} (剩餘:{{$item->remain}})
                            <div class="defaultHide defaultWidth">
                                <label class="equipLabelx">x</label>
                                <input type="number" class="form-control" min="1" value="1" name="count[{{$item->id}}]">
                            </div>
                        </label>
                        
                    </div>
                </div>
            @endforeach
                <!--<div class="col-xs-12 usrclassinfo">
                    <div class="col-xs-6 col-md-3">
                        <div class="checkbox">
                            <label class="equipLabel">
                                <input type="checkbox" value="">
                                鑰匙
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <div class="checkbox">
                            <label class="equipLabel">
                                <input type="checkbox" value="">
                                筆電 
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <div class="checkbox">
                            <label class="equipLabel">
                                <input type="checkbox" value="">
                                投影機 
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <div class="checkbox">
                            <label class="equipLabel">
                                <input type="checkbox" value="">
                                投影幕
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <div class="checkbox">
                            <label class="equipLabel">
                                <input type="checkbox" value="">
                                投影筆
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <div class="checkbox">
                            <label class="equipLabel">
                                <input type="checkbox" value="" class="check">
                                推車 
                                <div class="defaultHide defaultWidth">
                                    <label class="equipLabelx">x</label>
                                    <input type="text" class="form-control">
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <div class="checkbox">
                            <label class="equipLabel">
                                <input type="checkbox" value="" class="check">
                                掃把
                                <div class="defaultHide defaultWidth">
                                    <label class="equipLabelx">x</label>
                                    <input type="text" class="form-control">
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <div class="checkbox">
                            <label class="equipLabel">
                                <input type="checkbox" value="">
                                黑金剛
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <div class="checkbox">
                            <label class="equipLabel">
                                <input type="checkbox" value="">
                                海報架
                            </label>
                        </div>
                    </div>
                </div>-->
                <!-- col-xs-12 -->

            </div><!--row of equip-->
            
            <button type="submit" class="btn btn-default">送出</button>
        
        </form>
    </div><!--end of tab-content col-md-8-->

</div>

@endsection    

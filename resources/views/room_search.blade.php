@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-2">
    </div> 
    <div class="col-md-8">
        <div class="tab-pane" id="room_record" role="tabpanel">
            <nav class="navbar navbar-default custom_adnavbar">
                <div class="container-fluid">
                    <form class="navbar-form navbar-left">
                        <div class="form-group">
                            <input type="text" class="form-control custom_adinput" placeholder="Search">
                        </div>
                        <label>
                            教室
                            <select name="classroom" class="custom_adselect">
                                <option value="119">119</option>
                                <option value="221">221</option>
                                <option value="349">349</option>
                                <option value="608">608</option>
                                <option value="616a">616a</option>
                                <option value="616b">616b</option>
                            </select>
                        </label>
                        <button type="submit" class="btn btn-default custom_adbtn">搜尋紀錄</button>
                        <button type="reset" class="btn btn-default custom_adbtn">清除紀錄</button>
                    </form>
                </div><!-- /.container-fluid -->
            </nav>    
        </div>
    </div>
</div>
@endsection    

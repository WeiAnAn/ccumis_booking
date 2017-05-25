@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('layouts.user')
    </div> 
    <!-- Tab panes -->
    <div class="tab-content col-md-8">
        <div class="usrcontent">借閱教室</div>
        <div class="custom_seperator"></div>
        
        <div class="booking-classroom">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>  
                        <th width="5%">
                            <input type="checkbox"  disabled>
                        </th>  
                        <th width="15%">教室</th>
                        <th width="25%">時間</th>
                        <th width="35%">課程名稱</th>
                        <th width="15%">借用人</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="checkbox">
                        </td>
                        <td>326</td>
                        <td>10:00~12:00</td>
                        <td>test</td>
                        <td>test</td>
                        
                        
                    </tr>
                </tbody>

            </table>
        </div>

        <div class="usrcontent">借閱設備</div>
        <div class="custom_seperator"></div>

        <div class="booking-classroom">
            <table class="table table-striped table-bordered table-hover">
            </table>
        </div>
            
    </div><!--end of tab-content col-md-8-->

</div>    

@endsection    

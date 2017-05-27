<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassroomRecord;
use App\Classroom;
use Auth;

class ClassroomRecordController extends Controller
{
    function api(Request $request){
        $data = ClassroomRecord::with('classroom')
            ->where('date',$request->date)
            ->where('status','>',0)
            ->get();
        return $data->toJson();
    }

    function roomReserveIndex(){
        $classrooms = Classroom::all();
        $arr = compact('classrooms');
        return view('user.room_reserve',$arr);
    }

    function addRoomReserve(Request $request){
        $user = Auth::user();
        $arr = $request->all();
        $arr['status'] = 0;
        $arr['borrower'] = $user->name;
        $arr['user_id'] = $user->id;
        $arr['start_time'] = $request->startHour.":".$request->startMin;
        $arr['end_time'] = $request->endHour.":".$request->endMin;
        ClassroomRecord::create($arr);
        return redirect('/user/room_reserve');
    }

    function showRoomReserve(){
        $records = ClassroomRecord::with('classroom')
            ->with('user')
            ->where('status', 0)
            ->get();
        $data = compact('records');
        return view('/admin/room_reserve_manage', $data);
    }

    function acceptRoomReserve($id){
        ClassroomRecord::where('id',$id)
            ->update(['status'=>1]);
            
        return redirect('/admin/room_reserve_manage');
    }
    function rejectRoomReserve($id,Request $request){
        ClassroomRecord::where('id',$id)
            ->update(['status'=>-1,'reason'=>$request->reason]);
        return redirect('/admin/room_reserve_manage');
    }

    function showCompletedRoomReserve(){
        $records = ClassroomRecord::with('classroom')
            ->with('user')
            ->where('status','1')
            ->orWhere('status','-1')
            ->paginate(15);
        $data = compact('records');
        return view('admin.room_reserve_complete',$data);
    }

    function showSelfRoomReserve(){
        $user = Auth::user();
        $completedRecords = ClassroomRecord::with('classroom')
            ->with('user')
            ->where('status', '1')
            ->orWhere('status', '-1')
            ->paginate(10);
        $activeRecords = ClassroomRecord::with('classroom')
            ->with('user')
            ->where('status', '0')
            ->get();

        $data = compact('completedRecords', 'activeRecords');
        return view('user.review_reserve', $data);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassroomRecord;
use App\Classroom;
use Auth;
use Validator;

class ClassroomRecordController extends Controller
{
    public function api(Request $request){
        $data = ClassroomRecord::with('classroom')
            ->where('date',$request->date)
            ->where('status','>',0)
            ->orderBy('start_time', 'desc')
            ->get();
        return $data->toJson();
    }

    public function getBorrowClass(Request $request){
        $user = Auth::user();
        $records = ClassroomRecord::with('classroom')
            ->where('date', $request->date)
            ->where('status', 2)
            ->where('borrow_datetime', null)
            ->orWhere('status', 1)
            ->where('date', $request->date)
            ->where('reserve_user_id', $user->id)
            ->where('borrow_datetime', null)
            ->get();
        foreach ($records as $record) {
            $record['_token'] = csrf_token();
        }
        return $records->toJson();
    }

    public function roomReserveIndex(){
        $classrooms = Classroom::all();
        $arr = compact('classrooms');
        return view('user.room_reserve',$arr);
    }

    public function addRoomReserve(Request $request){
        $rule = [
            'name' => 'required|max:191',
            'type' => 'required',
            'date' => 'required|max:191|date',
            'classroom_id' => 'required',
            'startHour' => 'required',
            'startMin' => 'required',
            'endHour' => 'required',
            'endMin' => 'required',
        ];
        $validator = Validator::make($request->all(), $rule);

        $user = Auth::user();
        $arr = $request->all();
        $arr['status'] = 0;
        $arr['borrower'] = $user->name;
        $arr['reserve_user_id'] = $user->id;
        $arr['start_time'] = $request->startHour.":".$request->startMin;
        $arr['end_time'] = $request->endHour.":".$request->endMin;

        $validator->after(function($validator) use($arr){
            if($this->isAlreadyReserve($arr))
                $validator->errors()->add('time', '此時段已有借用紀錄');
            if($arr['start_time']>$arr['end_time'])
                $validator->errors()->add('time', '開始時間需在結束時間之前');
        });

        if($validator->fails())
            return redirect('/user/room_reserve')->withErrors($validator)->withInput();
       
        ClassroomRecord::create($arr);
        return redirect('/user/review_reserve');
    }

    public function showRoomReserve(){
        $records = ClassroomRecord::with('classroom')
            ->with('reserver')
            ->where('status', 0)
            ->get();
        $data = compact('records');
        return view('/admin/room_reserve_manage', $data);
    }

    public function acceptRoomReserve($id){
        ClassroomRecord::where('id',$id)
            ->update(['status'=>1]);
            
        return redirect('/admin/room_reserve_manage');
    }
    public function rejectRoomReserve($id,Request $request){
        ClassroomRecord::where('id',$id)
            ->update(['status'=>-1,'reason'=>$request->reason]);
        return redirect('/admin/room_reserve_manage');
    }

    public function showCompletedRoomReserve(){
        $records = ClassroomRecord::with('classroom')
            ->with('reserver')
            ->where('status','1')
            ->orWhere('status','-1')
            ->paginate(15);
        $data = compact('records');
        return view('admin.room_reserve_complete',$data);
    }

    public function showSelfRoomReserve(){
        $user = Auth::user();
        $completedRecords = ClassroomRecord::with('classroom')
            ->where('status', '1')
            ->orWhere('status', '-1')
            ->paginate(10);
        $activeRecords = ClassroomRecord::with('classroom')
            ->where('status', '0')
            ->get();

        $data = compact('completedRecords', 'activeRecords');
        return view('user.review_reserve', $data);
    }

    public function addBorrow($id){
        ClassroomRecord::where('id',$id)
            ->update([
                'borrow_datetime'=>date("Y-m-d H:i:s"),
                'borrow_user_id' => Auth::id()    
            ]);
        return redirect('/user/not_returned');
    }

    public function showBorrowIndex(){
        return view('user.room_borrow');
    }

    public function userHistory(){
        $records = ClassroomRecord::with('classroom')
            ->where('borrow_user_id', Auth::id())
            ->whereNotNull('return_datetime')
            ->paginate(15);
        $data = compact('records');
        return view('user.classroom_history', $data);
    }

    public function adminHistory(){
        $records = ClassroomRecord::with('classroom')
            ->with('user')
            ->whereNotNull('return_datetime')
            ->paginate(15);
        $data = compact('records');
        return view('admin.classroom_history', $data);
    }

    private function isAlreadyReserve($arr){
        return ClassroomRecord::where('classroom_id', $arr['classroom_id'])
            ->where('date', $arr['date'])
            ->where(function($query) use($arr){
                $query->where(function($query) use($arr){
                    $query->where('start_time','>=', $arr['start_time'])
                        ->where('start_time','<', $arr['end_time']);
                })->orWhere(function($query) use($arr){
                        $query->where('end_time','>', $arr['start_time'])
                        ->where('end_time','<=', $arr['end_time']);
                });
            })
            ->count();
    }

    public function searchView(){
        $classrooms = Classroom::all();
        
        $data = compact('classrooms');
        return view('room_search', $data);
    }

    public function search(Request $request){
        $records = ClassroomRecord::with('classroom');
        $classrooms = Classroom::all();
    
        if($request->classroom_id != null)
            $records = $records->where('classroom_id', $request->classroom_id);

        if($request->name != null)
            $records = $records->where('name', 'like', "%$request->name%");

        $records = $records->where('status', '>', 0)
            ->paginate();
        
        $records->appends($request->except("page"));
        $data = compact('classrooms', 'records');
        return view('room_search', $data);
    }
}

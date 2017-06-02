<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassroomRecord;
use App\EquipmentRecord;
use App\Equipment;
use Auth;

class ReturnController extends Controller
{
    public function index(){
        $classrooms = ClassroomRecord::with('classroom')
            ->whereNotNull('borrow_datetime')
            ->whereNull('return_datetime')
            ->where('borrow_user_id', Auth::id())
            ->get();
        $equipment = EquipmentRecord::with('equipment')
            ->whereNotNull('borrow_datetime')
            ->whereNull('return_datetime')
            ->where('user_id', Auth::id())
            ->get();
        $data = compact('classrooms', 'equipment');
        return view('user.not_returned', $data);
    }

    public function doReturn(Request $request){
        $equipment = $request->item;
        $classrooms = $request->classroom;
        if(gettype($classrooms) == "array")
            foreach($classrooms as $classroom){
                ClassroomRecord::where('id', $classroom)
                    ->update(['return_datetime'=> date("Y-m-d H:i:s")]);
            }
        if(gettype($equipment) == "array")
            foreach($equipment as $id){
                $record = EquipmentRecord::find($id);
                $item = Equipment::find($record->equipment_id);
                $item->remain = $item->remain + $record->count;
                $item->save();
                $record->return_datetime = date("Y-m-d H:i:s");
                $record->save();
            }
        return redirect('/user/not_returned');
    }

    public function adminIndex(){
        $classrooms = ClassroomRecord::with('classroom')
            ->with('user')
            ->whereNotNull('borrow_datetime')
            ->whereNull('return_datetime')
            ->get();
        $equipment = EquipmentRecord::with('equipment')
            ->with('user')
            ->whereNotNull('borrow_datetime')
            ->whereNull('return_datetime')
            ->get();
        $data = compact('classrooms', 'equipment');
        return view('admin.not_returned', $data);
    }

    public function adminReturn(Request $request){
        $equipment = $request->item;
        $classrooms = $request->classroom;
        if(gettype($classrooms) == "array")
            foreach($classrooms as $classroom){
                ClassroomRecord::where('id', $classroom)
                    ->update(['return_datetime'=> date("Y-m-d H:i:s")]);
            }
        if(gettype($equipment) == "array")
            foreach($equipment as $id){
                $record = EquipmentRecord::find($id);
                $item = Equipment::find($record->equipment_id);
                $item->remain = $item->remain + $record->count;
                $item->save();
                $record->return_datetime = date("Y-m-d H:i:s");
                $record->save();
            }
        return redirect('/admin/not_returned');
    }
}

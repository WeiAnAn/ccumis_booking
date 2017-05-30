<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipment;
use App\EquipmentRecord;
use Auth;

class EquipmentRecordController extends Controller
{
    public function showBorrowIndex(){
        $equipment = Equipment::all();
        $data = compact('equipment');
        return view('user.equipment_borrow', $data);
    }

    public function addBorrow(Request $request){
        $arr = $request->all();
        $user = Auth::user();
        foreach($arr['equipment_id'] as $id){
            $equipment = Equipment::find($id);
            $equipment->remain = $equipment->remain-(int)$arr['count'];
            $equipment->save();
            $record = [];
            $record['equipment_id'] = $id;
            $record['count'] = $arr['count'][$id];
            $record['user_id'] = $user->id;
            $record['borrow_datetime'] = date("Y-m-d H:i:s");
            EquipmentRecord::create($record);
        }
        return redirect('user/equipment_borrow');
    }

    public function userHistory(){
        $equipment = EquipmentRecord::with('equipment')
            ->where('user_id', Auth::id())
            ->whereNotNull('return_datetime')
            ->paginate(15);
        $data = compact('equipment');
        return view('user.equipment_history', $data);
    }
}

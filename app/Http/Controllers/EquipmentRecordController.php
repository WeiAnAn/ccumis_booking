<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipment;
use App\EquipmentRecord;
use Auth;

class EquipmentRecordController extends Controller
{
    public function borrowIndex(){
        $equipment = Equipment::all();
        $data = compact('equipment');
        return view('user.equipment_borrow', $data);
    }

    public function borrowAdd(Request $request){
        $arr = $request->all();
        $user = Auth::user();
        foreach($arr['equipment_id'] as $id){
            $record = [];
            $record['equipment_id'] = $id;
            $record['count'] = $arr['count'][$id];
            $record['user_id'] = $user->id;
            $record['borrow_datetime'] = date("Y-m-d H:i:s");
            EquipmentRecord::create($record);
        }
        return redirect('user/equipment_borrow');
    }
}

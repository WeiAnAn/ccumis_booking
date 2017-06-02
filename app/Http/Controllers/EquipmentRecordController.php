<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipment;
use App\EquipmentRecord;
use Auth;
use Validator;

class EquipmentRecordController extends Controller
{
    public function showBorrowIndex(){
        $equipment = Equipment::all();
        $data = compact('equipment');
        return view('user.equipment_borrow', $data);
    }

    public function addBorrow(Request $request){
        $rule = [
            'equipment_id' => 'array|required',
            'count' => 'array|required',
            'count.*' => 'integer|min:1'
        ];
        $validator = Validator::make($request->all(), $rule);
       

        $arr = $request->all();
        $user = Auth::user();
        $recordArr = [];
        $equipmentArr = [];
        
        foreach($arr['equipment_id'] as $id){
            $equipment = Equipment::find($id);

            $validator->after(function($validator) use($arr, $equipment, $id){
                if($equipment->remain < (int)$arr['count'][$id])
                    $validator->errors()->add('count', '設備數量不足');
            });

            $equipment->remain = $equipment->remain-(int)$arr['count'][$id];

            $record = [];
            $record['equipment_id'] = $id;
            $record['count'] = $arr['count'][$id];
            $record['user_id'] = $user->id;
            $record['borrow_datetime'] = date("Y-m-d H:i:s");
            
            array_push($recordArr, $record);
            array_push($equipmentArr, $equipment);
        }
        if($validator->fails())
            return redirect('/user/equipment_borrow')->withErrors($validator);

        foreach($equipmentArr as $equipment)
            $equipment->save();
        foreach($recordArr as $record)
            EquipmentRecord::create($record);

        return redirect('user/not_returned');
    }

    public function userHistory(){
        $equipment = EquipmentRecord::with('equipment')
            ->where('user_id', Auth::id())
            ->whereNotNull('return_datetime')
            ->paginate(15);
        $data = compact('equipment');
        return view('user.equipment_history', $data);
    }

    public function adminHistory(){
        $equipment = EquipmentRecord::with('equipment')
            ->with('user')
            ->where('user_id', Auth::id())
            ->whereNotNull('return_datetime')
            ->paginate(15);
        $data = compact('equipment');
        return view('admin.equipment_history', $data);
    }

}

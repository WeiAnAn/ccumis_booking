<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipment;

class EquipmentController extends Controller
{
    public function index(){
        $equipments = Equipment::all();
        $data = compact('equipments');
        return view('admin.equipment_manage', $data);
    }

    public function add(Request $request){
        $this->validate($request, [
            'name' => 'required|max:191',
            'count' => 'required|min:1|integer'
        ]);
        $arr = $request->all();
        $arr['total'] = $arr['count'];
        $arr['remain'] = $arr['count'];
        Equipment::create($arr);
        return redirect('admin/equipment_manage');
    }

    public function delete($id){
        Equipment::destroy($id);
        return redirect('admin/equipment_manage');
    }

    public function edit($id){
        $data = Equipment::find($id);
        return view('admin/equipment_edit', $data);
    }

    public function update($id, Request $request){
        $this->validate($request, [
            'name' => 'required|max:191',
            'count' => 'required|min:1|integer'
        ]);
        $old = Equipment::find($id);
        $arr = $request->all();
        $new['total'] = $arr['count'];
        $new['remain'] = $arr['count'] - ($old['total']-$old['remain']);
        $new['name'] = $arr['name'];
        Equipment::where('id',$id)
            ->update($new);
        return redirect('admin/equipment_manage');
    }
}
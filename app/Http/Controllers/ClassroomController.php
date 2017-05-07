<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;

class ClassroomController extends Controller
{
    //
    public function index(){
        $classrooms = Classroom::all();

        return view('admin.room_manage',['classrooms'=>$classrooms]);
    }

    public function add(Request $request){
        Classroom::create($request->all());
        return redirect('/admin/room_manage');
    }

    public function delete(Request $request,$id){
        Classroom::destroy($id);
        return redirect('/admin/room_manage');
    }

    public function edit($id){
        $classroom = Classroom::find($id);
        return view('admin.room_edit',['classroom'=>$classroom]);
    }

    public function update(Request $request, $id){
        Classroom::where('id',$id)
            ->update($request->except('_token'));
        return redirect('/admin/room_manage');
    }

}

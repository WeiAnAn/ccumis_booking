<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Semester;

class SemesterController extends Controller
{
    //
    public function index(){
        $semesters = Semester::all();

        return view('admin.semester_manage', ['semesters' => $semesters]);
    }

    public function add(Request $request){
        Semester::create($request->all());
        return redirect('/admin/semester_manage');
    }

    public function edit($id){
        $semester = Semester::find($id);
        return view('/admin/semester_edit', $semester);
    }

    public function update(Request $request,$id){
        Semester::where('id',$id)
            ->update($request->except('_token'));
        return redirect('/admin/semester_manage');
    }

    public function delete($id){
        Semester::destroy($id);
        return redirect('/admin/semester_manage');
    }
}

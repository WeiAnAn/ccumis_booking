<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Semester;
use App\Classroom;
use App\ClassroomRecord;
use App\SemesterClass;
use Auth;

class SemesterClassController extends Controller
{
    public function index(){
        $semesters = Semester::all();
        $classrooms = Classroom::all();
        $semesterClasses = SemesterClass::with('semester')
            ->with('classroom')
            ->get();
        $array = compact("semesters","classrooms","semesterClasses");
        return view('admin.semester_class_manage', $array);
    }
    
    public function add(Request $request){
        $semester = Semester::find($request->semester_id);
        $addDate = $this->getNearDay($semester->start_date, $request->day);
        $firstDate = strtotime($semester->start_date." +".$addDate." days");
        $endDate = strtotime($semester->end_date);
        
        $arr = $request->all();
        $arr['start_time'] = $request->startHour.":".$request->startMin;
        $arr['end_time'] = $request->endHour.":".$request->endMin;
        $arr['reserve_user_id'] = Auth::id();
        $arr['status'] = 2;
        $semesterClass = SemesterClass::create($arr);
        $arr['semester_class_id'] = $semesterClass->id;

        for($date = $firstDate;$date<$endDate;$date+=86400*7){
            $arr['date'] = date("Y-m-d",$date);
            ClassroomRecord::create($arr);
        }
        return redirect('/admin/semester_class_manage');
    }

    public function edit($id){
        $semesters = Semester::all();
        $classrooms = Classroom::all();
        $class = SemesterClass::
            with('semester')
            ->with('classroom')
            ->find($id);
            
        $array = compact("semesters","classrooms","class");
        return view('admin.semester_class_edit', $array);
    }

    public function update(Request $request, $id){
        $originClass = SemesterClass::find($id);
        $request->merge([
            'start_time' => $request->startHour.":".$request->startMin,
            'end_time' => $request->endHour.":".$request->endMin
            ]);
        $updateArr = $request->except(['_token', 'startHour', 'startMin', 'endHour', 'endMin']);
            
        SemesterClass::where('id',$id)
            ->update($updateArr);
        if($originClass->day == $request->day && $originClass->semester_id == $request->semester_id){
            $updateArr = $request->except(['_token', 'startHour', 'startMin', 'endHour', 'endMin','semester_id', 'day']);
            ClassroomRecord::where('semester_class_id', $id)
                ->update($updateArr);
        }else{
            ClassroomRecord::where('semester_class_id', $id)
                ->delete();

            $semester = Semester::find($request->semester_id);
            $addDate = $this->getNearDay($semester->start_date, $request->day);
            $firstDate = strtotime($semester->start_date." +".$addDate." days");
            $endDate = strtotime($semester->end_date);
            
            $arr = $request->all();
            $arr['start_time'] = $request->startHour.":".$request->startMin;
            $arr['end_time'] = $request->endHour.":".$request->endMin;
            $arr['user_id'] = Auth::id();
            $arr['status'] = 2;
            $arr['semester_class_id'] = $id;
            
            for($date = $firstDate;$date<$endDate;$date+=86400*7){
                $arr['date'] = date("Y-m-d",$date);
                ClassroomRecord::create($arr);
            }
            
        }
        return redirect('/admin/semester_class_manage');
    }

    public function delete($id){
        ClassroomRecord::where('semester_class_id',$id)
            ->delete();
        SemesterClass::destroy($id);
        return redirect('/admin/semester_class_manage');
    }

    private function getNearDay($date, $day){
        $wd = date('w', strtotime($date));
        $addDate = $day - $wd;
        if($addDate < 0){
            return $addDate+7;
        }
        return $addDate;
    }
}

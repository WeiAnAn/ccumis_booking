<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Semester;
use App\Classroom;
use App\ClassroomRecord;
use App\SemesterClass;

class SemesterClassController extends Controller
{
    public function index(){
        $semesters = Semester::all();
        $classrooms = Classroom::all();
        $array = compact("semesters","classrooms");
        return view('admin.semester_class_manage', $array);
    }
    
    public function add(Request $request){
        $semester = Semester::find($request->semester_id);
        $addDate = $this->getNearDay($semester->start_date, $request->day);
        $firstDate = strtotime($semester->start_date." +".$addDate." days");
        $endDate = strtotime($semester->end_date);
        for($date = $firstDate;$date<$endDate;$date+=86400*7){

        }
        $arr = $request->all();
        $arr['start_time'] = $request->startHour.":".$request->startMin;
        $arr['end_time'] = $request->endHour.":".$request->endMin;
        // dump(SemesterClass::with('semester')->get()[0]->semester);
        // SemesterClass::create($arr);
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

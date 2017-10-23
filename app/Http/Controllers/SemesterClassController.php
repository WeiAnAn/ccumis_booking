<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Semester;
use App\Classroom;
use App\ClassroomRecord;
use App\SemesterClass;
use Auth;
use Validator;

class SemesterClassController extends Controller
{
    public function index(){
        $semesters = Semester::orderBy('id', 'desc')->get();;
        $classrooms = Classroom::all();
        $semesterClasses = SemesterClass::with('semester')
            ->with('classroom')
            ->get();
        $array = compact("semesters","classrooms","semesterClasses");
        return view('admin.semester_class_manage', $array);
    }
    
    public function add(Request $request){
        $rule = [
            'semester_id' => 'required',
            'day' => 'required',
            'classroom_id' => 'required',
            'startHour' => 'required',
            'startMin' => 'required',
            'endHour' => 'required',
            'endMin' => 'required',
            'name' => 'required|max:191',
            'borrower' => 'required|max:191'
        ];
        $validator = Validator::make($request->all(), $rule);
        
        $semester = Semester::find($request->semester_id);
        $addDate = $this->getNearDay($semester->start_date, $request->day);
        $firstDate = strtotime($semester->start_date." +".$addDate." days");
        $endDate = strtotime($semester->end_date);
        
        $arr = $request->all();
        $arr['start_time'] = $request->startHour.":".$request->startMin;
        $arr['end_time'] = $request->endHour.":".$request->endMin;
        $arr['reserve_user_id'] = Auth::id();
        $arr['status'] = 2;

        $validator->after(function($validator) use($arr){
            if($this->isAlreadyReserve($arr))
                $validator->errors()->add('time', '此時段已有借用紀錄');
            if($arr['start_time']>$arr['end_time'])
                $validator->errors()->add('time', '開始時間需在結束時間之前');
        });

        if($validator->fails())
            return redirect('/admin/semester_class_manage')->withErrors($validator)->withInput();

        $semesterClass = SemesterClass::create($arr);
        $arr['semester_class_id'] = $semesterClass->id;


        for($date = $firstDate;$date<$endDate;$date+=86400*7){
            $arr['date'] = date("Y-m-d",$date);
            ClassroomRecord::create($arr);
        }
        return redirect('/admin/semester_class_manage');
    }

    public function edit($id){
        $semesters = Semester::orderBy('id', 'desc')->get();
        $classrooms = Classroom::all();
        $class = SemesterClass::
            with('semester')
            ->with('classroom')
            ->find($id);
            
        $array = compact("semesters","classrooms","class");
        return view('admin.semester_class_edit', $array);
    }

    public function update(Request $request, $id){
        $rule = [
            'semester_id' => 'required',
            'day' => 'required',
            'classroom_id' => 'required',
            'startHour' => 'required',
            'startMin' => 'required',
            'endHour' => 'required',
            'endMin' => 'required',
            'name' => 'required|max:191',
            'borrower' => 'required|max:191'
        ];
        $validator = Validator::make($request->all(), $rule);

        $originClass = SemesterClass::find($id);

        $request->merge([
            'start_time' => $request->startHour.":".$request->startMin,
            'end_time' => $request->endHour.":".$request->endMin
            ]);
        $updateArr = $request->except(['_token', 'startHour', 'startMin', 'endHour', 'endMin']);
        
        $validator->after(function($validator) use($updateArr){
            if($this->isAlreadyReserve($updateArr))
                $validator->errors()->add('time', '此時段已有借用紀錄');
            if($updateArr['start_time']>$updateArr['end_time'])
                $validator->errors()->add('time', '開始時間需在結束時間之前');
        });

        if($validator->fails())
            return redirect("/admin/semester_class_edit/$id")->withErrors($validator)->withInput();

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

    private function isAlreadyReserve($arr){
        return SemesterClass::where('classroom_id', $arr['classroom_id'])
            ->where('day', $arr['day'])
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
}

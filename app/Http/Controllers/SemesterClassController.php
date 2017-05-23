<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Semester;

class SemesterClassController extends Controller
{
    public function index(){
        $semesters = Semester::all();
        return view('admin.semester_class_manage', ["semesters" => $semesters]);
    }
}

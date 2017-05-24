<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassroomRecord;

class ClassroomRecordController extends Controller
{
    function api(Request $request){
        $data = ClassroomRecord::with('classroom')
            ->where('date',$request->date)
            ->get();
        return $data->toJson();
    }
}

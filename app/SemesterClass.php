<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SemesterClass extends Model
{
    protected $fillable = ['semester_id', 'day', 'start_time', 'end_time', 'borrower', 'name', 'classroom_id'];

    public function semester(){
        return $this->hasOne('App\Semester','id', 'semester_id');
    }

    public function classroom(){
        return $this->hasOne('App\Classroom','id', 'classroom_id');
    }

}

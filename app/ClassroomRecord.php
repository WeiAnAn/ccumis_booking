<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassroomRecord extends Model
{
    protected $fillable = ['classroom_id', 'date', 'start_time',
        'end_time', 'return_datetime', 'status', 'user_id', 
        'borrower', 'semester_class_id', 'name'];
    
    public function classroom(){
        return $this->hasOne('App\Classroom', 'id', 'classroom_id');
    }
}

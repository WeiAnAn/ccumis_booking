<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassroomRecord extends Model
{
    protected $fillable = ['classroom_id', 'date', 'start_time',
        'end_time', 'return_datetime', 'status', 'user_id', 
        'borrower', 'semester_class_id', 'name', 'borrow_time',
        'type', 'reason'];
    
    public function classroom(){
        return $this->hasOne('App\Classroom', 'id', 'classroom_id');
    }
    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}

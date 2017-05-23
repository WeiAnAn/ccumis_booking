<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassroomRecord extends Model
{
    protected $fillable = ['classroom_id', 'date', 'start_time', 'end_time', 'return_datetime', 'status', 'user_id', 'borrower'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentRecord extends Model
{
    protected $fillable = [
        'equipment_id', 'user_id', 'count', 'borrow_datetime',
        'return_datetime',
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentRecord extends Model
{
    protected $fillable = [
        'equipment_id', 'user_id', 'count', 'borrow_datetime',
        'return_datetime',
    ];
    
    public function equipment(){
        return $this->hasOne('App\Equipment', 'id', 'equipment_id');
    }

    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}

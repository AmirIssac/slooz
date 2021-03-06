<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DayReport extends Model
{
    //
    public function orders(){
        return $this->hasMany(\App\Models\Order::class);
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    public function users(){
        return $this->hasMany('App\Models\User');
    }
}

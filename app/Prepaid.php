<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prepaid extends Model
{
    use SoftDeletes;

    public function orders(){
        return $this->belongsToMany('App\Order');
    }

}

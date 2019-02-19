<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function prepaids(){

        return $this->belongsToMany('App\Prepaid');

    }

    public function products(){

        return $this->belongsToMany('App\Product');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    //
    public function art(){
        return $this->belongsTo('App\Art');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}

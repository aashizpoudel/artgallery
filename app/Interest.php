<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    //
    protected $fillable = ['user_id','art_id'];
    public function art(){
        return $this->belongsTo('App\Art');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    
}

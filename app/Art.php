<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Art extends Model
{
    //
    protected $fillable = ['title','description','price','seller_phone','seller_name','seller_address',
    'negotiable','image','user_id'];

    public function delete(){
        Storage::delete($this->image);

        return parent::delete();
    }
}

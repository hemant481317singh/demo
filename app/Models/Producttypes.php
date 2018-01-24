<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producttypes extends Model
{
    protected $fillable = ['title','description','image','category_id','status','slug'];



    public function category(){
        return $this->belongsTo('App\Models\Categories');
    }

    public function products(){
        return $this->hasMany('App\Models\Products');
    }
}

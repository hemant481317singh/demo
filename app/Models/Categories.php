<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['title','description','image','status','slug'];


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $created_at = ['created_at'];
    public function producttype()
    {
        return $this->hasMany('App\Models\Producttypes');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Products');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['code',
        'category_id',
        'producttype_id',
        'image',
        'height',
        'height_unit',
        'width',
        'width_unit',
        'colour',
        'series',
        'application',
        'finish',
        'body',
        'frontresistant',
        'pei',
        'mohs',
        'cof',
        'dcof',
        'thickness',
        'price',
        'pricesqft',
        'conversion',
        'pieces',
        'weight_piece',
        'weight_box',
        'box_pallet',
        'pieces_pallet',
        'status'];



    public function category(){
        return $this->belongsTo('App\Models\Categories');
    }

    public function producttype(){
        return $this->belongsTo('App\Models\Producttypes');
    }
}

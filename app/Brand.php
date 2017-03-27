<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description'
    ];

    public $rules = [
        'name' => 'required|unique:brands|max:255',
    ];

    public function brandModel()
    {
        return $this->hasOne('App\BrandModel');
    }

    public function product(){
        return $this->hasOne('App\Product','brand_id');
    }

}

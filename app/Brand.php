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
        return $this->hasMany('App\BrandModel');
    }
}

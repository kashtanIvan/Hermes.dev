<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public $timestamps = false;

    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'hidden',
        'description'
    ];

    public $rules = [
        'name' => 'required|unique:categories|max:255',
        'parent_id' => 'integer|exists:categories,id'
    ];
    public function product()
    {
        return $this->hasMany('App\Product', 'cat_id');
    }
}

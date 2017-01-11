<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';

    protected $fillable = [
        'brand_id',
        'model_id',
        'cat_id',
        'hidden',
        'description',
        'slug'
    ];

    public function attributes()
    {
        return $this->belongsToMany('App\Attribute', 'prod_attr', 'prod_id', 'attr_id');
    }

    public function items()
    {
        return $this->hasMany('App\Item');
    }

    public function brand()
    {
        return $this->hasOne('App\Brand');
    }

    public function brandModel()
    {
        return $this->hasOne('App\BrandModel', 'model_id');
    }

    public function category()
    {
        return $this->hasOne('App\Category', 'parent_id');
    }
}

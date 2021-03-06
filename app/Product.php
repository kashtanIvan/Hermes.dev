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

    public $rules = [
        'brand_id' => 'integer|exists:brands,id',
        'model_id' => 'integer|exists:brand_models,id',
        'cat_id' => 'integer|exists:categories,id',
    ];

    public function attributes()
    {
        return $this->belongsToMany('App\Attribute', 'prod_attr', 'prod_id', 'attr_id');
    }

    public function images()
    {
        return $this->belongsToMany('App\Image', 'image_products', 'prod_id', 'image_id');
    }

    public function items()
    {
        return $this->hasMany('App\Item', 'prod_id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function model()
    {
        return $this->belongsTo('App\BrandModel');
    }

    public function category()
    {
        return $this->hasOne('App\Category', 'parent_id');
    }

    public function imageProduct()
    {
        return $this->hasOne('App\ImageProduct', 'prod_id');
    }
}

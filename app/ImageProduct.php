<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    protected $table = 'image_products';

    protected $fillable = [
        'image_id',
        'prod_id',
    ];

    public function product()
    {
        return $this->hasOne('App\Product', 'image_id');
    }

    public function image()
    {
        return $this->hasOne('App\Image', 'prod_id');
    }
}

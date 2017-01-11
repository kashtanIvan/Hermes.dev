<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    protected $table = 'brand_models';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'brand_id',
        'description'
    ];

    public function brand()
    {
        return $this->hasOne('App\Brand');
    }
}

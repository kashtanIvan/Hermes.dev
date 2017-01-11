<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table = 'attributes';

    public $timestamps = false;

    protected $fillable = [
        'key',
        'value'
    ];

    public function item()
    {
        return $this->belongsToMany('App\Item', 'item_attr', 'attr_id', 'item_id');
    }

    public function product()
    {
        return $this->belongsToMany('App\Product', 'prod_attr', 'attr_id', 'prod_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    //
    protected $table = 'menu_items';

    protected $fillable = [
        'name',
        'slug',
        'menu_id',
        'order_id',
        'hidden'
    ];

}

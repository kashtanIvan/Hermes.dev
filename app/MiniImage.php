<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MiniImage extends Model
{
    //
    protected $table = 'mini_images';

    protected $fillable = [
        'original_id',
        'size',
        'location',
    ];
}

<?php


namespace App\Services;

use App\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;

class ImageService
{

    private $_cache;

    public function __construct()
    {
        $this->_cache = Cache::store('file');
    }

    public function ping()
    {
        return 'Pong';
    }

    public function getAnyImage()
    {
        $image = Image::all()->random(1); //->toArray();
        $root = env('ROOT_IMAGE');

        //dump(env('ROOT_IMAGE'));
        /////////////
        $image = "{$root}{$image->location}{$image->id}.{$image->ext}";

        $img = asset($image);
        //dd($image);
        //echo $imageFile;
        echo "<img src =" . $img . ">";
        exit();
        //dd(base_path($img));
        //dd($image);
    }

}
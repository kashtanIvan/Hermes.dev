<?php


namespace App\Services;

use App\Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Request;
use Intervention\Image\Facades\Image as Imagick;

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

    public function addImage($data){
        $file = $data->file()['image'];
        $imagick = Imagick::make($file);
//        dd($file, $imagick);
        $postImage = [
            'ext' => $file->getClientOriginalExtension(),
            'width' => $imagick->width(),
            'height' => $imagick->height(),
            'size' => $imagick->filesize(),
        ];
//        dd($postImage);
        $image = new Image();
        $validator = Validator::make($postImage, $image->rules);
        dd($validator->errors()->all());
    }

    public function getAnyImage()
    {
        $image = Image::all()->random(1); //->toArray();
        $root = env('ROOT_IMAGE');

        //dump(env('ROOT_IMAGE'));
        /////////////
        $image = "{$root}{$image->location}{$image->id}.{$image->ext}";

        $img = asset($image);
        dd($image);
        //echo $imageFile;
        echo "<img src =" . $img . ">";
        exit();
        //dd(base_path($img));
        //dd($image);
    }

}
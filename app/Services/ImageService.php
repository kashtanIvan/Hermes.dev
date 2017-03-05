<?php


namespace App\Services;

use App\Image;
use App\MiniImage;
//use File;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Request;
use Intervention\Image\Facades\Image as Imagick;

class ImageService
{

    private $_cache;
    private $countImages = 50;

    public function __construct()
    {
        $this->_cache = Cache::store('file');
    }

    public function ping()
    {
        return 'Pong';
    }

    public function addImage($data)
    {
        $file = $data->file()['image'];
        list($width, $height) = getimagesize($file->path());
        $postImage = [
            'ext' => $file->getClientOriginalExtension(),
            'width' => $width,
            'height' => $height,
            'size' => $file->getsize(),
        ];
        $image = new Image();
        $validator = Validator::make($postImage, $image->rules);
        if ($validator->fails()) {
            dd($validator->errors()->all());
        } else {
            $image = $image->create($postImage);
            dd($image);
            $imageName = $image->id;
            $image->name = $imageName;
            $image->location = '/' . (int)floor($image->id / $this->countImages) . '/';
            $image->save();

            $root = env('ROOT_IMAGE') . $image->location;
            $file->move($root, $imageName . '.' . $image->ext);

            $minImage = MiniImage::create([
                'original_id' => $image->id,
                'location' => '/mini/',
            ]);
            $oldPath = $root . $imageName . '.' . $image->ext;
            $newPath = $root . $minImage->location . $minImage->id . '.' . 'jpg';
            if (!file_exists($root . $minImage->location)) {
                File::makeDirectory($root . $minImage->location);
            }
            Imagick::make($oldPath)->encode('jpg', 0)->resize(300, 200)->save($newPath);
            if(!file_exists($newPath)){
                dd(file_exists($newPath));
            }
            dd('ok');
        }
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
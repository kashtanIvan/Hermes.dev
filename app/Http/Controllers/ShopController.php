<?php

namespace App\Http\Controllers;

use App\Image;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;


class ShopController extends Controller
{
    public function index()
    {
//        $image = (new ImageService())->getAnyImage();
//        $value = '';
//       $cache = Cache::store('file');
//       $cache->put('key', 'hello', 12);
//       $value = $cache->get('key');
//       dd($value);
//       exit;
        return view('shop.index');
    }

    public function about()
    {
        $title = 'About';
        return view('shop.about')->with([
            'title' => $title
        ]);
    }

    public function showFormImg()
    {
        return view('shop.add-image');
    }

    public function postAddImg(Request $request)
    {
        echo "<pre>";
        $file = $request->file()['image'];

//        $file->save('ROOT_IMAGE'), '2.jpg');
        $postFile = [];
        $postFile['name'] = $file->getClientOriginalExtension();//getClientOriginalName();
//        dd($postFile);

        $image = new Image();
        $validator = Validator::make($postFile, $image->rules);
        dd($validator->errors());
        //todo validation


        $file->move(env('ROOT_IMAGE'), '2.jpg');
        exit();
    }
}

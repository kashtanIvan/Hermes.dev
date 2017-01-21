<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class ShopController extends Controller
{
   public function index()
   {
       $value = '';
//       $cache = Cache::store('file');
//       $cache->put('key', 'hello', 12);
//       $value = $cache->get('key');
//       dd($value);
//       exit;
       return view('shop.index');
   }

    public function about() {
        $title = 'About';
        return view('shop.about')->with([
            'title' => $title
        ]);;
    }
}

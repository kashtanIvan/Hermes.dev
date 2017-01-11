<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
   public function index()
   {
       return view('shop.index');
   }

    public function about() {
        $title = 'About';
        return view('shop.about')->with([
            'title' => $title
        ]);;
    }
}

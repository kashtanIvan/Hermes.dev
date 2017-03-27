<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function index()
    {
        $user = Sentinel::check();
        return view('shop.cabinet')->with([
            'title' => 'profile',
            'user' => $user
        ]);
    }

    public function indexCabinet()
    {
        $title = 'Cabinet';
//        $brand = $this->_productServices->getBrand();
        $user = Sentinel::check();
        return view('shop.cabinet')->with(['user' => $user, 'title' => $title]); //->with('brand' , $brand);
    }

}

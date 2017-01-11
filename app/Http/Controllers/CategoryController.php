<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function man()
    {
        $title = 'Man';
        return view('shop.category')->with([
            'title'=>$title
        ]);
    }
    public function woman()
    {
        $title = 'Woman';
        return view('shop.category')->with([
            'title' => $title
        ]);
    }


        public function accessories()
    {
        $title = 'Accessories';
        return view('shop.category')->with([
            'title' => $title
        ]);
    }

    }

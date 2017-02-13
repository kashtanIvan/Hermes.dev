<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OrderService;

class OrderController extends Controller
{
    private $_order;

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        $this->_order = new OrderService();
    }

    public function show(){
        return view('order.show');
    }

    public function create(Request $request){

    }


    public function dissmiss(Request $request){

    }

}

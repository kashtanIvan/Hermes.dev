<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services;
use App\Services\CheckoutService;

class CheckoutController extends Controller
{
    protected $_checkout;

    public function __construct()
    {
//        parent::__construct();
        $this->init();
    }

    public function init()
    {
        $this->_checkout = new CheckoutService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [
            ['id' => 1, 'data' => '23/23/23', 'qty' => 2],
            ['id' =>2, 'data' => '23/23/23', 'qty' => 3],
            ['id' =>3, 'data' => '23/23/23', 'qty' => 4]
        ];
        $data = $this->_checkout->setItems($data);
        return view('checkout.main')->with(['items' => $data]);
//       $this->_checkout->getItems();
    }

    public function add(Request $request)
    {
        $data = $request->all();
        $this->_checkout->setItems($data);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
        $this->_checkout->destroy($ids);
    }


    public function increase($id)
    {
        $this->_checkout->increase($id);
    }

    public function decrease($id)
    {
        $this->_checkout->decrease($id);
    }

    public function clear()
    {
        $this->_checkout->clear();
    }

    public function getSum()
    {
        $this->_checkout->getSum();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

}

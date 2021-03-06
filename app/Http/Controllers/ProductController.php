<?php

namespace App\Http\Controllers;

use App\Product;
use App\Services\ImageService;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

//use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Services\ProductService;

;

class ProductController extends Controller
{
    private $_productServices = false;
    private $_imageServices = false;

    public function __construct()
    {
        $this->productService();
        $this->imageService();
    }

    public function productService()
    {
        $this->_productServices = new ProductService();
    }

    public function imageService()
    {
        $this->_imageServices = new ImageService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Cabinet';
//        $brand = $this->_productServices->getBrand();
        $product = $this->_productServices->getAllProduct();
        $product = $product->toArray();
//        dd($product);
//        dd($product['0']['images'][0]['location']);
        $user = Sentinel::check();
        return view('auth.cabinet.product')->with([
            'user' => $user,
            'title' => $title,
            'products' => $product,
//            'delete' => false,
        ]); //->with('brand' , $brand);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cabinet';
        return view('shop.add')->with('title', $title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $this->_imageServices->addImage($request);
        $res = list($brand, $category, $brandModel, $product, $imageProdect) = $this->_productServices->addProduct($request);
        dd($res);
        $result = true; // заглушка
        if ($result)
            return 'ok';
        else return redirect()->back();
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
        $res = $this->_productServices->getProductById($id);
        dd($id);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Product::find($id);
        if ($prod->delete()) {
            session()->flash('del', true);
            return redirect()->back();
        } else {
            return redirect()->back();
        }

    }
}

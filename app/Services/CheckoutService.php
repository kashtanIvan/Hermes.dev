<?php
namespace App\Services;

use App\Item;
use App\User;
use Illuminate\Http\Request;

class CheckoutService
{
//    private $user;
    private $_reugest;

    public function __construct()
    {
        $this->_reugest = new Request();
    }
//    public function __construct(User $user)
//    {
//        $this->user = $user;
//    }

    public function setItems($data = [])
    {
        $this->clear();
        session(['checkout' => $data]);
        $ids = $this->getItemsIds();
        //var_dump($ids->toArray());
        //exit();
        $price = (new Item())->whereIn('id', $ids)->get()->sum('price');
        dd($price);
        $this->setSum($price);
    }


    public function getItemsInfo()
    {
//        return collect($this->getItems())->pluck('id');

    }

    public function getItemsIds()
    {
        return collect($this->getItems())->pluck('id');

    }


    public function getSum()
    {
        return session('checkout.items');
    }


    public function setSum($sum)
    {
        session(['checkout.sum' => $sum]);
    }

    public function getItems()
    {
        $data = session('checkout');
        return $data;
    }


    public function clear()
    {
        // session(['checkout.sum' => $sum])
    }

    public function increase($id)
    {

    }

    public function decrease($id)
    {

    }

    public function destroy($id)
    {

    }
}
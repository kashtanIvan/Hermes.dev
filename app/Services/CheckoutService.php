<?php
namespace App\Services;

use App\Item;
use App\User;
use Illuminate\Http\Request;

class CheckoutService
{

    private $_itemsKey = 'checkout.items';
    private $_sumKey = 'checkout.sum';
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
        session([$this->_itemsKey => $data]);
        $ids = $this->getItemsIds();
        $price = (new Item())->whereIn('id', $ids)->get()->sum('price');
        $this->setSum($price);
//        dd($data);
        $this->increase($idProduct = 1);
    }


    public function getItemsInfo()
    {
//        return collect($this->getItems())->pluck('id');

    }

    public function getItemsIds()
    {
        return collect($this->getItems())->pluck('id');

    }

    public function getItemById($id){
        return collect($this->getItems())->where('id', $id)->first();
    }


    public function getSum()
    {
        return session($this->_sumKey);
    }


    public function setSum($sum)
    {
        session([$this->_sumKey => $sum]);
    }

    public function getItems()
    {
        $data = session($this->_itemsKey);
        return $data;
    }


    public function clear()
    {
        // session(['checkout.sum' => $sum])
    }

    public function increase($id)
    {
        $item = $this->getItemById($id);
     //    $item->qty++;
        //$this->update();
            $item['qty']++;
        dd($item);

    }

    public function decrease($id)
    {

    }

    public function destroy($id)
    {

    }
}
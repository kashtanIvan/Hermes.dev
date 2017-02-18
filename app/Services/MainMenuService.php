<?php

namespace App\Services;

use App\MenuItem;
use Illuminate\Support\Facades\DB;

class MainMenuService
{
    private $table = 'menu_items';
    public function getMenus(){
        $menus = DB::table($this->table)->where('order_id', '1')->orderby('menu_id', 'asc')->get();
//        dd($menus);
        return $menus;
    }
}
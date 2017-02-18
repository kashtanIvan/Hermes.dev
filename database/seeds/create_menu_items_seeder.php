<?php

use Illuminate\Database\Seeder;

class create_menu_items_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\MenuItem::create([
            'name' => 'home',
            'slug' => 'home',
            'menu_id' => 1,
            'order_id' => 1,
            'hidden' => true
        ]);
        App\MenuItem::create([
            'name' => 'man',
            'slug' => 'man',
            'menu_id' => 2,
            'order_id' => 1,
            'hidden' => true
        ]);
        App\MenuItem::create([
            'name' => 'women',
            'slug' => 'women',
            'menu_id' => 3,
            'order_id' => 1,
            'hidden' => true
        ]);
        App\MenuItem::create([
            'name' => 'accessories',
            'slug' => 'accessories',
            'menu_id' => 4,
            'order_id' => 1,
            'hidden' => true
        ]);
        App\MenuItem::create([
            'name' => 'about',
            'slug' => 'about',
            'menu_id' => 5,
            'order_id' => 1,
            'hidden' => true
        ]);
    }
}

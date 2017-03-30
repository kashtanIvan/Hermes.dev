<?php

use Illuminate\Database\Seeder;

//use App;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $category = [
            'name' => 'root',
            'hidden' => 0,
            'description' => 'Our main category for all product',
            'slug' => 'main'
        ];
        $item = [
            'hidden' => false,
            'qty' => 5,
            'price' => 10,
            'slug' => 'main'
        ];
        $product = [
            'hidden' => 0,
            'description' => 'description from product',
            'slug' => 'main',
        ];

        $attribute = [
            'key' => 'color',
            'value' => 'green',
        ];

        $brand = [
            'name' => 'brand1',
            'description' => 'description on brand',
        ];

        $brandModel =[
            'name' => 'name brandModel',
            'description' => 'description on brandModel',
        ];

        $category = App\Category::create($category);

        $brand = App\Brand::create($brand);
        $brandModel = App\BrandModel::create($brandModel);

        $product = array_merge($product, [
                                            'brand_id' => $brand->id,
                                            'model_id' => $brandModel->id,
                                            'cat_id' => $category->id
                                        ]);

        //$product->brand()->save($brand);
        $product = App\Product::create($product);

        $item = array_merge($item, ['prod_id' => $product->id]);
        $item = App\Item::create($item);

        $attribute = App\Attribute::create($attribute);
        //sync();
//        $prodAttr = [
//            'prod_id' => $product->id,
//            'attr_id' => $attribute->id,
//        ];
        $product->attributes()->sync([$attribute->id]);

//        $itemAttr = [
//            'item_id' => $item->id,
//            'attr_id' => $attribute->id
//        ];

        $item->attributes()->sync([$attribute->id]);

        //$prodAttr =  App\Product()::create($prodAttr);

/*
        $prodAttr->attributes()->sync([[
            'prod_id' => 2, 'attr_id' => 3,
            'prod_id' => 7, 'attr_id' => 8
        ]]);

        (new App\Attribute())->item()->sync([['attr_id' => 2, 'item_id' => 3]]);
*/
        $this->call(create_menu_items_seeder::class);

        $imageProd = [
            'prod_id' => 1,
            'image_id' => 1,
        ];
        $imageProd = App\ImageProduct::create($imageProd);

    }
}

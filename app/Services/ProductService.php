<?php
namespace App\Services;

use App\Brand;
use App\BrandModel;
use App\Category;
use Illuminate\Support\Facades\DB;
use App\Product;


class ProductService
{
    public function addProduct($data)
    {
        $array = [];

        if ($data->brand === '0') {

            $brand = new Brand();
            $brand->name = $data->newBrand;
            $brand->save();

            $array = array_merge($array, ['brand_id' => $brand->id]);
        } else $array = array_merge($array, ['brand_id' => $data->brand]);

        if ($data->model === '0') {

            $model = new BrandModel();
            $model->name = $data->newBrandModel;
            $model->brand_id = $array['brand_id'];
            $model->save();

            $array = array_merge($array, ['model_id' => $model->id]);
        } else $array = array_merge($array, ['model_id' => $data->model]);

        if ($data->category === '0') {

            $category = new Category();
            $category->name = $data->newCategory;
            $category->slug = $data->slug;
            $category->hidden = $data->hidden;
            $category->save();

            $array = array_merge($array, ['cat_id' => $category->id]);
        } else $array = array_merge($array, ['cat_id' => $data->category]);

        //dd($array);
        $array = array_merge($array, [
            'hidden' => $data->hidden,
            'description' => $data->description,
            'slug' => $data->slug
        ]);

        $product = new Product();
        $product->fill($array)->save();
        return;
    }

    public function getBrand()
    {
        return DB::table('brands')->select('id', 'name')->get();
    }

    public function getBrandModel()
    {
        return DB::table('brand_models')->select('id', 'name')->get();
    }

    public function getCategory()
    {
        return DB::table('categories')->select('id', 'name')->get();
    }
}
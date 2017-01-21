<?php

namespace App\Services;


use App\Brand;
use App\BrandModel;
use App\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;

//use Illuminate\Support\Facades\DB;

class FilterService
{
    private $array = [];
    private $error = [];

    public function saveData($data)
    {

        if (!is_null($data->brand)) {
            //dd($data->brand);
            $this->array['brand_id'] = $data->brand;
        } else if (!empty($data->newBrand)) {
            //dd($data->newBrand);
            $brand = new Brand();
            $brand->name = $data->newBrand;
            $brand->save();
            $this->array['brand_id'] = $brand->id;
        } else {
            //dd('sad');
            $this->error['brand'] = "Brand not find";
            return $this->error;
        }

        if (!is_null($data->model)) {
            $this->array['model_id'] = $data->brand;
        } else if (!empty($data->newBrandModel)) {
            $model = new BrandModel();
            $model->name = $data->newBrandModel;
            $model->brand_id = $this->array['brand_id'];
            $model->save();
            $this->array['model_id'] = $model->id;
        } else {
            $this->error['model'] = "Model not find";
        }

        if (!is_null($data->category)) {
            $this->array['cat_id'] = $data->category;
        } else if (!empty($data->newCategory)) {
            $category = new Category();
            $category->name = $data->newCategory;
            $category->slug = $data->slug;
            $category->hidden = $data->hidden;
            $category->save();
            $this->array['cat_id'] = $category->id;
        } else {
            $this->error['category'] = "Category not find";
        }

        $this->array = array_merge($this->array, ['hidden' => $data->hidden,
            'description' => $data->description,
            'slug' => $data->slug]);

        if (!empty($this->error)){
            return $this->error;
        }
        else return $this->array;
        exit();
    }


///////////////////////////////////////////////////////////////////////
//
//    private $_cache = false;
//
//    public function __construct()
//    {
//        $this->filterService();
//    }
//
//    public function filterService()
//    {
//        $this->_filterService = new FilterService();
//    }
//
//    public function getListOfData()
//    {
//        $_cache = new Cache();
//        $cacheKeyAllData = 'cache_all_Data';
//        if (!$this->_cache->has($cacheKeyAllData)) {
//            $data = $this->_categoryModel->all();
//            $this->_cache->pull($cacheKeyAllData, $data, 2);
//        } else {
//            $data = $this->_cache->get($cacheKeyAllData);
//        }
//        dd($data);
//    }

}


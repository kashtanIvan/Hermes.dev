<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Product;

use App\Brand;
use App\BrandModel;
use App\Category;
use Illuminate\Support\Facades\Validator;

class ProductService
{
    private $_filterService = false;

    private $array = [];
    private $error = [];

    private $brandPk = 'id';
    private $brandName = 'name';

    private $_validator;

    public function __construct()
    {
        $this->filterService();
        $this->createValidator();
    }

    public function filterService()
    {
        $this->_filterService = new FilterService();
    }

    public function createValidator()
    {
        if (!$this->_validator) {
            $this->_validator = new Validator();
        }
        return $this->_validator;
    }

    public function addProduct($data)
    {

        $this->sliceOnEntity($data);
        exit();
        dd($data);
        $product = new Product();

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
        if (!empty($this->error)) {
        }

//        $result = $this->_filterService->saveData($data);
//        $result = $product->fill($result)->save();
//        if ($result)
//            return true;
//        else return false;
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


    protected function sliceOnEntity($data)
    {
        //dd($data->all());
        $data['parent_id'] = '1';
        $brand = $category = $product = $brandModel = false;
        if (array_key_exists('brand', $data->all())) {
            $brand = (new Brand())->find($data['brand']);
        } elseif (array_key_exists('newBrand', $data->all())) {
            $brand = new Brand();
            $postBrand = ['name' => $data['newBrand']];
            $validator = Validator::make($postBrand, $brand->rules);
            if ($validator->fails()) {
                $this->error = array_merge($this->error, $validator->errors()->all());
            } else {
                $brand = $brand::create($postBrand);
            }
        } else {
            $this->error[] = 'Brand not found';
        }
        if ($brand) {
            if (array_key_exists('newBrandModel', $data->all())) {
                $brandModel = new BrandModel();
                $postBrandModel = [
                    'brand_id' => $brand->id,
                    'name' => $data['newBrandModel'],
                ];
                $validator = Validator::make($postBrandModel, $brandModel->rules);
                if ($validator->fails()) {
                    $this->error = array_merge($this->error, $validator->errors()->all());
                } else {
                    $brandModel = $brandModel->create($postBrandModel);
                }
            } else {
                $errors[] = 'Brand Model not filled';
            }
        } else {
            $errors[] = 'Brand not found';
        }

        if (array_key_exists('category', $data->all())) {
            $category = (new Category())->find($data['category']);
        } elseif (array_key_exists('newCategory', $data->all())) {
            $category = new Category();
            $postCategory = ['name' => $data['newCategory'],
                'parent_id' => $data['parent_id']
            ];
            $validator = Validator::make($postCategory, $category->rules);
            if ($validator->fails()) {
                $this->error = array_merge($this->error, $validator->errors()->all());
            } else {
                $category = $category::create($postCategory);
            }
        } else {
            $this->error[] = 'Category not found';
        }

        dd($brandModel->toArray(), $brand->toArray(), $category->toArray(), $this->error);

        return [$brand, $category, $product];
    }
}
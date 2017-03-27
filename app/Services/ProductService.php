<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Product;
use App\Services\ImageService;

use App\Brand;
use App\BrandModel;
use App\Category;
use App\ImageProduct;
use App\Image;
use Illuminate\Support\Facades\Validator;

class ProductService
{
    private $_filterService = false;

    private $error = [];

    private $brandPk = 'id';
    private $brandName = 'name';

    private $_validator;
    private $_imageService;

    public function __construct()
    {
        $this->filterService();
        $this->createValidator();
        $this->imageService();
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

    public function imageService()
    {
        $this->_imageService = new ImageService();
    }

    public function addProduct($data)
    {

        return $this->sliceOnEntity($data);


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

    public function getAllProduct(){
        $allProd = Product::with('category','brand','model','images', 'items')->get();
        return $allProd;
    }


    protected function sliceOnEntity($data)
    {
//        dd($data->all());
        $data['parent_id'] = '1';
        $brand = $category = $product = $brandModel = $imageProd = false;
        if (array_key_exists('image', $data->all())) {
            $imageRes = $this->_imageService->addImage($data);
//            dd($imageErrors );
            if (is_array($imageRes)) {
                $this->error = array_merge($this->error, $imageRes);
            } else {
                $postImage = [
                    'image_id' => $imageRes,
                ];
            }
        }

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

        if (empty($this->error)) {
            $product = new Product();
            $postProduct = [
                'brand_id' => $brand->id,
                'model_id' => $brandModel->id,
                'cat_id' => $category->id,
            ];
            $validator = Validator::make($postProduct, $product->rules);
            if ($validator->fails()) {
                $this->error = array_merge($this->error, $validator->errors()->all());
            } else {
                $product = $product::create($postProduct);
//                dd($product);
                //$brand->product()->sync(['brand_id' => $brand->id]);
                $postImage['prod_id'] = $product->id;
                $imageProd = new ImageProduct();
                $imageProd = $imageProd::create($postImage);
//                dd($postImage);
            }
        } else {
            return $this->error;
//            dd($brandModel->toArray(), $brand->toArray(), $category->toArray(), $category->toArray(), $this->error);
        }
//        dd($brand, $category, $brandModel, $product);
        return [$brand, $category, $brandModel, $product, $imageProd, $this->error];
    }
}
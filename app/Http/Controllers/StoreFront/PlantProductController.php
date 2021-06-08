<?php

namespace App\Http\Controllers\StoreFront;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\Contracts\ICategory;
use App\Repositories\Contracts\IPlantProduct;
use App\Repositories\Eloquent\Criteria\EagerLoad;


class PlantProductController extends Controller
{
    protected $categories;
    protected $plantProducts;
    
    // constructor
    public function __construct(ICategory $categories, IPlantProduct $plantProducts) 
    {
        $this->categories = $categories;
        $this->plantProducts = $plantProducts;
    }

    public function index($category_slug=null)
    {
        $data = [];

        $data['category'] = $this->categories->findWhere('slug', $category_slug)->first();
        $data['products'] = $this->plantProducts->getCategoryProducts($category_slug);
        $data['categories'] = $this->categories->categoriesTree();

        return view('store-front.plant-products.list-category-products', $data);
    }

    public function productDetail($category_slug, $product_slug)
    {
        $data = [];

        $data['category'] = $this->categories->findWhere('slug', $category_slug)->first();
        $data['product'] = $this->plantProducts->getProductDetail($product_slug)->first();
        $data['categories'] = $this->categories->categoriesTree();

        return view('store-front.plant-products.detail', $data);
    }
}

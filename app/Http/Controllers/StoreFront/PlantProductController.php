<?php

namespace App\Http\Controllers\StoreFront;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\Contracts\ICategory;
use App\Repositories\Contracts\IPlantProduct;
use App\Repositories\Contracts\IUser;
use App\Repositories\Eloquent\Criteria\EagerLoad;
use Illuminate\Support\Facades\Auth;

class PlantProductController extends Controller
{
    protected $categories;
    protected $plantProducts;
    protected $users;
    
    // constructor
    public function __construct(ICategory $categories, IPlantProduct $plantProducts, IUser $users) 
    {
        $this->categories = $categories;
        $this->plantProducts = $plantProducts;
        $this->users = $users;
    }

    public function index(Request $request, $category_slug=null)
    {
        $data = [];

        $data['category'] = $this->categories->findWhere('slug', $category_slug)->first();
        $data['products'] = $this->plantProducts->getCategoryProducts($category_slug);
        $data['categories'] = $this->categories->categoriesTree();

        $user = $request->session()->get('guest_user') ?? Auth::user();
        $data['cartCount'] =  $this->users->cartCount($user);

        return view('store-front.plant-products.list-category-products', $data);
    }

    public function productDetail(Request $request, $category_slug, $product_slug)
    {
        $data = [];

        $data['category'] = $this->categories->findWhere('slug', $category_slug)->first();
        $data['product'] = $this->plantProducts->getProductDetail($product_slug)->first();
        $data['categories'] = $this->categories->categoriesTree();

        $user = $request->session()->get('guest_user') ?? Auth::user();
        $data['cartCount'] =  $this->users->cartCount($user);

        return view('store-front.plant-products.detail', $data);
    }
}

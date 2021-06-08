<?php

namespace App\Http\Controllers\StoreFront;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\Contracts\ICategory;
use App\Repositories\Contracts\IPlantProduct;
use App\Repositories\Eloquent\Criteria\EagerLoad;


class HomeController extends Controller
{
    protected $categories;
    protected $plantProducts;


    // constructor
    public function __construct(ICategory $categories, IPlantProduct $plantProducts) 
    {
        $this->categories = $categories;
        $this->plantProducts = $plantProducts;
    }

    public function index()
    {
        $data = [];

        $data['categories'] = $this->categories->categoriesTree();

        $data['products'] = $this->plantProducts->withCriteria([
            new EagerLoad(['category'])
        ])->all();

        return view('store-front.index', $data);
    }
}

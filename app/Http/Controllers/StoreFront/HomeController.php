<?php

namespace App\Http\Controllers\StoreFront;

use App\Http\Controllers\Controller;
use App\Models\CartProduct;
use Illuminate\Http\Request;

use App\Repositories\Contracts\ICategory;
use App\Repositories\Contracts\IPlantProduct;
use App\Repositories\Contracts\IUser;
use App\Repositories\Eloquent\Criteria\EagerLoad;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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

    public function index(Request $request)
    {
        $data = [];

        $data['categories'] = $this->categories->categoriesTree();

        $data['products'] = $this->plantProducts->withCriteria([
            new EagerLoad(['category'])
        ])->all();

        $user = $request->session()->get('guest_user') ?? Auth::user();
        $data['cartCount'] =  $this->users->cartCount($user);

        return view('store-front.index', $data);
    }
}

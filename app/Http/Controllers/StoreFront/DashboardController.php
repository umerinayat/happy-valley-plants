<?php

namespace App\Http\Controllers\StoreFront;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\Contracts\ICategory;
use App\Repositories\Contracts\IUser;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $categories;
    protected $users;


    // constructor
    public function __construct(ICategory $categories, IUser $users) 
    {
        $this->categories = $categories;
        $this->users = $users;
    }

    public function index(Request $request)
    {
        $data = [];
        $data['categories'] = $this->categories->categoriesTree();

        $user = $request->session()->get('guest_user') ?? Auth::user();
        $data['cartCount'] =  $this->users->cartCount($user);

        return view ('store-front.dashboard', $data);
    }
}

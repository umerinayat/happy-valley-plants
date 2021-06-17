<?php

namespace App\Http\Controllers\StoreFront;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\Contracts\ICategory;

class DashboardController extends Controller
{
    protected $categories;

    // constructor
    public function __construct(ICategory $categories) 
    {
        $this->categories = $categories;
    }

    public function index()
    {
        $data = [];
        $data['categories'] = $this->categories->categoriesTree();

        return view ('store-front.dashboard', $data);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Repositories\Contracts\IUser;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public $users;

    public function __construct(IUser $users)
    {
        $this->users = $users;
    }

    public function index()
    {   
        return UserResource::collection($this->users->all());
    }

    public function orders()
    {
        return 'orders';
    }
}

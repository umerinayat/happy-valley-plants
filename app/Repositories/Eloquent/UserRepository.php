<?php

namespace App\Repositories\Eloquent;

use App\Models\CartProduct;
use App\Models\User;
use App\Repositories\Contracts\IUser;

class UserRepository extends BaseRepository implements IUser
{
    public function model()
    {
        return User::class;
    }

    public function cartCount($user)
    {
        if ( $user )
        {
            return CartProduct::where('user_id', $user->id)->count();
        }
        else
        {
            return 0;
        }
    }
}
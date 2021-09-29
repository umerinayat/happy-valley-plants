<?php

namespace App\Http\Controllers\StoreFront;

use App\Http\Controllers\Controller;
use App\Models\CartProduct;
use App\Models\PlantProduct;
use App\Models\User;
use Illuminate\Http\Request;

use App\Repositories\Contracts\ICategory;
use App\Repositories\Contracts\IPlantProduct;
use App\Repositories\Contracts\IUser;
use App\Repositories\Eloquent\Criteria\EagerLoad;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
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

        $user = $request->session()->get('guest_user') ?? Auth::user();

        $data['categories'] = $this->categories->categoriesTree();

        if ( $user )
        {
            $data['cartProducts'] = CartProduct::where('user_id', $user->id)->with([
                'product'
            ])->get();
        }
        else
        {
            $data['cartProducts'] = [];
        }

        $subTotal = 0;
        $shippingTotal = 6.00;
        foreach($data['cartProducts'] as $cp)
        {
            $price = $cp->product->selling_price * $cp->quantity;
            $subTotal += $price;
        }
     

        $data["subTotal"] = $subTotal;
        $data["shippingTotal"] = $shippingTotal;
        $data["totalPrice"] = $subTotal + $shippingTotal;

        $user = $request->session()->get('guest_user') ?? Auth::user();
        $data['cartCount'] =  $this->users->cartCount($user);

        return view('store-front.cart.cart', $data);
    }

    public function checkout(Request $request) 
    {
        $data = [];

        $user = $request->session()->get('guest_user') ?? Auth::user();

        $data['categories'] = $this->categories->categoriesTree();

        if ( $user )
        {
            $data['cartProducts'] = CartProduct::where('user_id', $user->id)->with([
                'product'
            ])->get();
        }
        else
        {
            $data['cartProducts'] = [];
        }

        $subTotal = 0;
        $shippingTotal = 6.00;
        foreach($data['cartProducts'] as $cp)
        {
            $price = $cp->product->selling_price * $cp->quantity;
            $subTotal += $price;
        }
     

        $data["subTotal"] = $subTotal;
        $data["shippingTotal"] = $shippingTotal;
        $data["totalPrice"] = $subTotal + $shippingTotal;

        $user = $request->session()->get('guest_user') ?? Auth::user();
        $data['cartCount'] =  $this->users->cartCount($user);

        return view('store-front.cart.checkout', $data);
    }

    public function addProductToCart(Request $request, $id) 
    {
        $user = $request->session()->get('guest_user') ?? Auth::user();

        if($user == null)
        {
            $user = Auth::user() ?? User::create(['is_guest_user' => true]);

            if($user->is_guest_user == 1) 
            {   
                $request->session()->put('guest_user', $user);
            }
        } 

        $product = PlantProduct::where('id', $id)->get();

        if( count($product) > 0 )
        {   
            $cartProduct = CartProduct::where('plant_product_id', $id)->where('user_id', $user->id)->get();

            if( count($cartProduct) > 0 )
            {   
                // $cartProduct->first()->quantity += 1;
                // $cartProduct->first()->save();

                return [
                    'message' => "Already in your cart.",
                    'cartCount' => CartProduct::where('user_id', $user->id)->count()
                ];
            } 
            else
            {
                CartProduct::create([
                    'plant_product_id' => $id,
                    'user_id' => $user->id,
                ]);

                return [
                    'message' => "Plant Added To Cart.",
                    'cartCount' => 1
                ];
            }
        } 
        else 
        {
            return [
                'message' => "Plant Not Found."
            ];
        }
    }
}

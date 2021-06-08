<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Currency;
use App\Models\PaymentPlatform;

class PaymentController extends Controller
{
    public function index()
    {
        return view('store-front.payments')->with([
            'currencies' => Currency::all(),
            'paymentPlatforms' => PaymentPlatform::all()
        ]);
    }
}

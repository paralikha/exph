<?php

namespace Shop\Controllers;

use Illuminate\Http\Request;
use Pluma\Controllers\Controller;
use Shop\Support\Payment\PayPal\Traits\PayPalCredentials;
use Shop\Support\Payment\PayPal\Traits\PayPalPayment;

class ShopController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
    }
}

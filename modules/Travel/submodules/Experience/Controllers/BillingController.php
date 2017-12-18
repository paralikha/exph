<?php

namespace Experience\Controllers;

use Anam\Phpcart\Cart as CartModel;
use Anam\Phpcart\Facades\Cart;
use Experience\Models\Experience;
use Illuminate\Http\Request;
use Shop\Controllers\ShopController;

class BillingController extends ShopController
{
    /**
     * Show the detail form
     * @param  \Illuminate\Http\Request $request
     * @param  string $code
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request, $code)
    {
        $resource = Experience::whereCode($code)->first();

        return view("Experience::experiences.detail")->with(compact('resource'));
    }

    /**
     * Add
     *
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function add(Request $request)
    {
        Cart::clear();
        $cart = new CartModel();
        $cart->add($request->input('items'));

        return redirect()->route('experiences.payment', $request->input('code'));
    }

    /**
     * Payment
     *
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function payment(Request $request, $code)
    {
        $items = Cart::items();
        $total = Cart::getTotal();
        $resource = Experience::whereCode($code)->first();

        return view("Experience::billing.payment")->with(compact('items', 'total', 'resource'));
    }
}

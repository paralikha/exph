<?php

namespace Cashier\Controllers;

use Cashier\Models\Cashier;
use Cashier\Requests\CashierRequest;
use Illuminate\Http\Request;
use Order\Models\Order;
use Shop\Controllers\ShopController;

class PaymentController extends ShopController
{
    /**
     * Get the success page.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function success(Request $request)
    {
        $resource = Order::where('payment_id', $request->get('order'))->first();
        // $resource = Order::receipt($id)->get();

        return view("Theme::shop.success")->with(compact('resource'));
    }

    /**
     * Get the failed page.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function failed(Request $request)
    {
        $resource = Order::where('payment_id', $request->get('order'))->first();
        // $resource = Order::receipt($id)->get();

        return view("Theme::shop.failed")->with(compact('resource'));
    }
}

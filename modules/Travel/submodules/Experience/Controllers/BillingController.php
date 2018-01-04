<?php

namespace Experience\Controllers;

use Anam\Phpcart\Cart as CartModel;
use Anam\Phpcart\Facades\Cart;
use Experience\Models\Experience;
use Illuminate\Http\Request;
use Order\Models\Order;
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
        $cart = Cart::items();
        $guests = Cart::has($resource->id)
            ? Cart::get($resource->id)->guests
            : @(unserialize(Order::where('experience_id', $resource->id)
                            ->where('customer_id', (is_null(user()) ?: user()->id))
                            ->exists() ? Order::where('experience_id', $resource->id)
                            ->where('customer_id', (is_null(user()) ?: user()->id))
                            ->first()->metadata
                            : [])
            );

        return view("Experience::experiences.detail")->with(compact('resource', 'cart', 'guests'));
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

        // $order = Order::firstOrNew([
        //     'customer_id' => $request->input('customer_id'),
        //     'experience_id' => $request->input('experience_id'),
        // ]);
        // $order->customer_id = $request->input('customer_id');
        // $order->experience_id = $request->input('experience_id');
        // $order->total = Cart::getTotal();
        // $order->quantity = $cart->totalQuantity();
        // $order->metadata = serialize($request->input('guests'));
        // $order->status = 'pending';
        // $order->save();

        return redirect()->route('experiences.payment', [$request->input('code')]);
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
        $resource = Experience::whereCode($code)->first();
        $item = $items[$resource->id];
        // $order = Order::find($order_id);
        $total = Cart::getTotal();

        if (is_null(user())) {
            return abort(404);
        }

        return view("Experience::billing.payment")->with(compact('items', 'item', 'total', 'resource'));
    }

    public function success(Request $request)
    {
        $order = Order::where('payment_id', $request->get('payment_id'))
                        ->where('payer_id', $request->get('payer_id'))
                        ->where('customer_id', user()->id)
                        ->firstOrFail();

        return view("Theme::shop.success")->with(compact('order'));
    }

    public function failed(Request $request)
    {
        return view("Theme::shop.failed");
    }
}

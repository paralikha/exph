<?php

namespace Cart\Controllers;

use Anam\Phpcart\Facades\Cart;
use Cart\Requests\CartRequest;
use Illuminate\Http\Request;
use Shop\Controllers\ShopController;

class CartController extends ShopController
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view("Theme::shop.cart");
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug = null)
    {
        return view("Theme::cart.show");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Cart\Requests\CartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $cart = Cart::add($request->except(['_token']));

        return redirect()->route('shop.cart');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //

        return view("Theme::carts.edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Cart\Requests\CartRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CartRequest $request, $id)
    {
        //

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //

        return redirect()->route('carts.index');
    }

    /**
     * Clear the cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function clear()
    {
        Cart::clear();

        return back();
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \Cart\Requests\CartRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(CartRequest $request, $id)
    {
        //

        return back();
    }

    /**
     * Delete the specified resource from storage permanently.
     *
     * @param  \Cart\Requests\CartRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(CartRequest $request, $id)
    {
        //

        return redirect()->route('carts.trash');
    }
}

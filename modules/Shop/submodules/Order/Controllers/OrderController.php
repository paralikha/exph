<?php

namespace Order\Controllers;

use Frontier\Controllers\AdminController;
use Illuminate\Http\Request;
use Order\Models\Order;
use Order\Requests\OrderRequest;

class OrderController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        return view("Theme::orders.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //

        return view("Theme::orders.show");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view("Theme::orders.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Order\Requests\OrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        //

        return back();
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

        return view("Theme::orders.edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Order\Requests\OrderRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, $id)
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

        return redirect()->route('orders.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        //

        return view("Theme::orders.trash");
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \Order\Requests\OrderRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(OrderRequest $request, $id)
    {
        //

        return back();
    }

    /**
     * Delete the specified resource from storage permanently.
     *
     * @param  \Order\Requests\OrderRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(OrderRequest $request, $id)
    {
        //

        return redirect()->route('orders.trash');
    }
}

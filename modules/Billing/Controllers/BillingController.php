<?php

namespace Billing\Controllers;

use Frontier\Controllers\AdminController;
use Illuminate\Http\Request;
use Billing\Models\Billing;
use Billing\Requests\BillingRequest;

class BillingController extends AdminController
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

        return view("Billing::billings.index");
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

        return view("Billing::billings.show");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view("Theme::billings.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Billing\Requests\BillingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BillingRequest $request)
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

        return view("Theme::billings.edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Billing\Requests\BillingRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BillingRequest $request, $id)
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

        return redirect()->route('billings.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        //

        return view("Theme::billings.trash");
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \Billing\Requests\BillingRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(BillingRequest $request, $id)
    {
        //

        return back();
    }

    /**
     * Delete the specified resource from storage permanently.
     *
     * @param  \Billing\Requests\BillingRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(BillingRequest $request, $id)
    {
        //

        return redirect()->route('billings.trash');
    }
}

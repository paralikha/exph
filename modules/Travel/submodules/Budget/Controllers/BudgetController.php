<?php

namespace Budget\Controllers;

use Frontier\Controllers\AdminController;
use Illuminate\Http\Request;
use Budget\Models\Budget;
use Budget\Requests\BudgetRequest;

class BudgetController extends AdminController
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

        return view("Theme::budgets.index");
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

        return view("Theme::budgets.show");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view("Theme::budgets.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Budget\Requests\BudgetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BudgetRequest $request)
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

        return view("Theme::budgets.edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Budget\Requests\BudgetRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BudgetRequest $request, $id)
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

        return redirect()->route('budgets.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        //

        return view("Theme::budgets.trash");
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \Budget\Requests\BudgetRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(BudgetRequest $request, $id)
    {
        //

        return back();
    }

    /**
     * Delete the specified resource from storage permanently.
     *
     * @param  \Budget\Requests\BudgetRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(BudgetRequest $request, $id)
    {
        //

        return redirect()->route('budgets.trash');
    }
}

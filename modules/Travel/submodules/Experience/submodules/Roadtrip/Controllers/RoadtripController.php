<?php

namespace Roadtrip\Controllers;

use Frontier\Controllers\AdminController;
use Illuminate\Http\Request;
use Roadtrip\Models\Roadtrip;
use Roadtrip\Requests\RoadtripRequest;

class RoadtripController extends AdminController
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

        return view("Theme::roadtrips.index");
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

        return view("Theme::roadtrips.show");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view("Theme::roadtrips.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Roadtrip\Requests\RoadtripRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoadtripRequest $request)
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

        return view("Theme::roadtrips.edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Roadtrip\Requests\RoadtripRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoadtripRequest $request, $id)
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

        return redirect()->route('roadtrips.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        //

        return view("Theme::roadtrips.trash");
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \Roadtrip\Requests\RoadtripRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(RoadtripRequest $request, $id)
    {
        //

        return back();
    }

    /**
     * Delete the specified resource from storage permanently.
     *
     * @param  \Roadtrip\Requests\RoadtripRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(RoadtripRequest $request, $id)
    {
        //

        return redirect()->route('roadtrips.trash');
    }
}

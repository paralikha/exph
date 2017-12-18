<?php

namespace Experience\Controllers;

use Catalogue\Models\Catalogue;
use Category\Models\Category;
use Experience\Models\Amenity;
use Experience\Requests\AmenityRequest;
use Frontier\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use User\Models\User;

class AmenityController extends AdminController
{
    /**
     * Display a listinAmenity of the resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $resources = Amenity::all();

        return view("Experience::amenities.index")->with(compact('resources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Theme::experiences.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Amenity\Requests\AmenityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AmenityRequest $request)
    {
        $amenity = new Amenity();
        $amenity->name = $request->input('name');
        $amenity->code = $request->input('code');
        $amenity->alias = $request->input('alias');
        $amenity->icon = $request->input('icon');
        $amenity->description = $request->input('description');
        $amenity->save();

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

        return view("Theme::experiences.edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Amenity\Requests\AmenityRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AmenityRequest $request, $id)
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

        return redirect()->route('experiences.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        //

        return view("Theme::experiences.trash");
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \Amenity\Requests\AmenityRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(AmenityRequest $request, $id)
    {
        //

        return back();
    }

    /**
     * Delete the specified resource from storage permanently.
     *
     * @param  \Amenity\Requests\AmenityRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(AmenityRequest $request, $id)
    {
        //

        return redirect()->route('experiences.trash');
    }
}

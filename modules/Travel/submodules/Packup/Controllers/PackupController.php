<?php

namespace Packup\Controllers;

use Catalogue\Models\Catalogue;
use Category\Models\Category;
use Packup\Models\Packup;
use Packup\Requests\PackupRequest;
use Frontier\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use User\Models\User;
use Review\Models\Review;

class PackupController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $resources = Packup::paginate();

        if (null !== $request->get('date_from') && null !== $request->get('date_to')) {
            $resources = Packup::whereBetween('date_start', [$request->get('date_from'), $request->get('date_to')])->paginate();
        }

        return view("Theme::packups.index")->with(compact('resources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catalogues = Catalogue::mediabox();
        $categories = Category::type('packup')->pluck('name', 'id');
        $managers = User::thatIs(['superadmin', 'travel-manager', 'manager'])->get();

        return view("Theme::packups.create")->with(compact('catalogues', 'categories', 'managers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Packup\Requests\PackupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PackupRequest $request)
    {
        $packup = new Packup();
        $packup->name = $request->input('name');
        $packup->code = $request->input('code');
        $packup->body = $request->input('body');
        $packup->price = $request->input('price');
        $packup->delta = $request->input('delta');
        $packup->map = $request->input('map');
        $packup->map_instructions = $request->input('map_instructions');
        $packup->feature = $request->input('feature');
        $packup->user()->associate(User::find($request->input('user')));
        $packup->save();

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
        $resource = Packup::findOrFail($id);
        $catalogues = Catalogue::mediabox();
        $categories = Category::type('packup')->get(['name', 'id'])->toArray();
        $managers = User::thatIs(['superadmin', 'travel-manager', 'manager'])->get();

        return view("Theme::packups.edit")->with(compact('resource', 'catalogues', 'categories', 'managers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Packup\Requests\PackupRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PackupRequest $request, $id)
    {
        // echo "<pre>";
        //     var_dump( $request->all() ); die();
        // echo "</pre>";
        $packup = Packup::findOrFail($id);
        $packup->name = $request->input('name');
        $packup->code = $request->input('code');
        $packup->body = $request->input('body');
        $packup->price = $request->input('price');
        $packup->delta = $request->input('delta');
        $packup->map = $request->input('map');
        $packup->map_instructions = $request->input('map_instructions');
        $packup->feature = $request->input('feature');
        $packup->user()->associate(User::find($request->input('user')));
        $packup->save();

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

        return redirect()->route('packups.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        //

        return view("Theme::packups.trash");
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \Packup\Requests\PackupRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(PackupRequest $request, $id)
    {
        //

        return back();
    }

    /**
     * Delete the specified resource from storage permanently.
     *
     * @param  \Packup\Requests\PackupRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(PackupRequest $request, $id)
    {
        //

        return redirect()->route('packups.trash');
    }

    /**
     * Review the specified resource from storage permanently.
     *
     * @param  \Packup\Requests\PackupRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function review(Request $request, $id)
    {
        $review = New Review();
        $review->user()->associate(User::find($request->input('user_id')));
        $review->approved = true;
        $review->body = $request->input('body');
        $review->delta = $request->input('delta');

        $packup = Packup::findOrFail($id);
        $packup->reviews()->save($review);
        $packup->save();

        return back();
    }
}

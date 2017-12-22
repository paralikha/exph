<?php

namespace Experience\Controllers;

use Catalogue\Models\Catalogue;
use Category\Models\Category;
use Experience\Models\Amenity;
use Experience\Models\Experience;
use Experience\Requests\ExperienceRequest;
use Frontier\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use User\Models\User;
use Review\Models\Review;

class ExperienceController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $resources = Experience::paginate();

        if (null !== $request->get('date_from') && null !== $request->get('date_to')) {
            $resources = Experience::whereBetween('date_start', [$request->get('date_from'), $request->get('date_to')])->paginate();
        }

        return view("Theme::experiences.index")->with(compact('resources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catalogues = Catalogue::mediabox();
        $categories = Category::type('experience')->pluck('name', 'id');
        $managers = User::thatIs(['superadmin', 'travel-manager', 'manager'])->get();
        $amenities = Amenity::all();

        return view("Theme::experiences.create")->with(compact('catalogues', 'amenities', 'categories', 'managers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Experience\Requests\ExperienceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExperienceRequest $request)
    {
        $experience = new Experience();
        $experience->name = $request->input('name');
        $experience->code = $request->input('code');
        $experience->reference_number = $request->input('reference_number');
        $experience->date_start = date('Y-m-d H:i:s', strtotime($request->input('date_start')));
        $experience->date_end = date('Y-m-d H:i:s', strtotime($request->input('date_end')));
        $experience->body = $request->input('body');
        $experience->delta = $request->input('delta');
        $experience->map = $request->input('map');
        $experience->map_instructions = $request->input('map_instructions');
        $experience->price = $request->input('price');
        $experience->feature = $request->input('feature');
        $experience->user()->associate(User::find($request->input('user')));
        $experience->save();
        $experience->amenities()->attach($request->input('amenities'));

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
        $resource = Experience::findOrFail($id);
        $catalogues = Catalogue::mediabox();
        $categories = Category::type('experience')->get(['name', 'id'])->toArray();
        $managers = User::thatIs(['superadmin', 'travel-manager', 'manager'])->get();
        $amenities = Amenity::all();

        return view("Theme::experiences.edit")->with(compact('resource', 'catalogues', 'categories', 'managers', 'amenities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Experience\Requests\ExperienceRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExperienceRequest $request, $id)
    {
        // echo "<pre>";
        //     var_dump( $request->all() ); die();
        // echo "</pre>";
        $experience = Experience::findOrFail($id);
        $experience->name = $request->input('name');
        $experience->code = $request->input('code');
        $experience->reference_number = $request->input('reference_number');
        $experience->date_start = date('Y-m-d H:i:s', strtotime($request->input('date_start')));
        $experience->date_end = date('Y-m-d H:i:s', strtotime($request->input('date_end')));
        $experience->body = $request->input('body');
        $experience->delta = $request->input('delta');
        $experience->map = $request->input('map');
        $experience->map_instructions = $request->input('map_instructions');
        $experience->price = $request->input('price');
        $experience->feature = $request->input('feature');
        $experience->user()->associate(User::find($request->input('user')));
        $experience->amenities()->sync($request->input('amenities'));
        $experience->save();

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
     * @param  \Experience\Requests\ExperienceRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(ExperienceRequest $request, $id)
    {
        //

        return back();
    }

    /**
     * Delete the specified resource from storage permanently.
     *
     * @param  \Experience\Requests\ExperienceRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(ExperienceRequest $request, $id)
    {
        //

        return redirect()->route('experiences.trash');
    }

    /**
     * Review the specified resource from storage permanently.
     *
     * @param  \Experience\Requests\ExperienceRequest  $request
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

        $experience = Experience::findOrFail($id);
        $experience->reviews()->save($review);
        $experience->save();

        return back();
    }
}

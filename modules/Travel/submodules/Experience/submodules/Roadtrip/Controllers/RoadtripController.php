<?php

namespace Roadtrip\Controllers;

use Catalogue\Models\Catalogue;
use Category\Models\Category;
use Experience\Models\Amenity;
use Experience\Models\Availability;
use Frontier\Controllers\AdminController;
use Illuminate\Http\Request;
use Review\Models\Review;
use Review\Requests\ReviewRequest;
use Roadtrip\Models\Roadtrip;
use Roadtrip\Requests\RoadtripRequest;
use User\Models\User;

class RoadtripController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
        $resources = Roadtrip::paginate();
        if (null !== $request->get('date_from') && null !== $request->get('date_to')) {
            $resources = Roadtrip::whereBetween('date_start', [$request->get('date_from'), $request->get('date_to')])->paginate();
        }

        return view("Theme::roadtrips.all")->with(compact('resources'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $resources = Roadtrip::paginate();

        if (null !== $request->get('date_from') && null !== $request->get('date_to')) {
            $resources = Roadtrip::whereBetween('date_start', [$request->get('date_from'), $request->get('date_to')])->paginate();
        }

        return view("Theme::roadtrips.index")->with(compact('resources'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {
        $resource = Roadtrip::whereCode($slug)->first();

        return view("Theme::roadtrips.show")->with(compact('resource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catalogues = Catalogue::mediabox();
        $categories = Category::type('roadtrip')->pluck('name', 'id');
        $managers = User::thatIs(['superadmin', 'travel-manager', 'manager'])->get();
        $amenities = Amenity::all();

        return view("Theme::roadtrips.create")->with(compact('catalogues', 'amenities', 'categories', 'managers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Roadtrip\Requests\RoadtripRequest  $request
     * @return Illuminate\Http\Response
     */
    public function store(RoadtripRequest $request)
    {
        $roadtrip = new Roadtrip();
        $roadtrip->name = $request->input('name');
        $roadtrip->code = $request->input('code');
        $roadtrip->reference_number = $request->input('reference_number');

        $start_date = date('Y-m-d H:i:s', strtotime($request->input('availabilities')[0]['date_start']));
        $end = $request->input('availabilities');
        $end = end($end);
        $end_date = date('Y-m-d H:i:s', strtotime($end['date_end']));
        $roadtrip->date_start = $start_date;
        $roadtrip->date_end = $end_date;

        $roadtrip->body = $request->input('body');
        $roadtrip->delta = $request->input('delta');
        $roadtrip->map = $request->input('map');
        $roadtrip->map_instructions = $request->input('map_instructions');
        $roadtrip->price = $request->input('price');
        $roadtrip->feature = $request->input('feature');
        $roadtrip->type = 'roadtrip';
        $roadtrip->user()->associate(User::find($request->input('user')));
        $roadtrip->save();
        $roadtrip->amenities()->attach($request->input('amenities'));

        foreach ($request->input('availabilities') as $availabilities) {
            $availability = new Availability();
            $availability->name = $request->input('name');
            $availability->description = @$availabilities['description'];
            $availability->date_start = $availabilities['date_start'];
            $availability->date_end = $availabilities['date_end'];
            // $availability->days = $availabilities['days'];
            $availability->save();
            $roadtrip->availabilities()->save($availability);
        }

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
        $resource = Roadtrip::findOrFail($id);
        $catalogues = Catalogue::mediabox();
        $categories = Category::type('roadtrip')->get(['name', 'id'])->toArray();
        $managers = User::thatIs(['superadmin', 'travel-manager', 'manager'])->get();
        $amenities = Amenity::all();

        return view("Theme::roadtrips.edit")->with(compact('resource', 'catalogues', 'categories', 'managers', 'amenities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Roadtrip\Requests\RoadtripRequest  $request
     * @param  int  $id
     * @return Illuminate\Http\Response
     */
    public function update(RoadtripRequest $request, $id)
    {
        $roadtrip = Roadtrip::findOrFail($id);
        $roadtrip->name = $request->input('name');
        $roadtrip->code = $request->input('code');
        $roadtrip->reference_number = $request->input('reference_number');

        $start_date = date('Y-m-d H:i:s', strtotime($request->input('availabilities')[0]['date_start']));
        $end = $request->input('availabilities');
        $end = end($end);
        $end_date = date('Y-m-d H:i:s', strtotime($end['date_end']));
        $roadtrip->date_start = $start_date;
        $roadtrip->date_end = $end_date;

        $roadtrip->body = $request->input('body');
        $roadtrip->delta = $request->input('delta');
        $roadtrip->map = $request->input('map');
        $roadtrip->map_instructions = $request->input('map_instructions');
        $roadtrip->price = $request->input('price');
        $roadtrip->feature = $request->input('feature');
        $roadtrip->user()->associate(User::find($request->input('user')));
        $roadtrip->amenities()->sync($request->input('amenities'));
        $roadtrip->save();

        $availableIds = [];
        foreach ($request->input('availabilities') as $availabilities) {
            $availability = Availability::findOrNew($availabilities['id']);
            $availability->name = $request->input('name');
            $availability->description = @$availabilities['description'];
            $availability->date_start = $availabilities['date_start'];
            $availability->date_end = $availabilities['date_end'];
            // $availability->days = $availabilities['days'];
            $availability->save();
            $roadtrip->availabilities()->save($availability);
            $availableIds[] = $availability->id;
        }
        $roadtrip->availabilities()->whereNotIn('id', $availableIds)->delete();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id = null)
    {
        Roadtrip::destroy($request->has('id') ? $request->input('id') : $id);

        return back();
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed(Request $request)
    {
        $resources = Roadtrip::onlyTrashed()
                         ->search($request->all())
                         ->paginate();

        return view("Roadtrip::roadtrips.trashed")->with(compact('resources'));
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \Roadtrip\Requests\RoadtripRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request, $id = null)
    {
        $roadtrips = Roadtrip::onlyTrashed()
                     ->whereIn('id', $request->has('id') ? $request->input('id') : [$id])
                     ->get();

        foreach ($roadtrips as $roadtrip) {
            $roadtrip->restore();
        }

        return back();
    }

    /**
     * Delete the specified resource from storage permanently.
     *
     * @param  \Roadtrip\Requests\RoadtripRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $roadtrips = Roadtrip::onlyTrashed()
                     ->whereIn('id', $request->has('id') ? $request->input('id') : [$id])
                     ->get();

        foreach ($roadtrips as $roadtrip) {
            $roadtrip->forceDelete();
        }

        return back();
    }

    /**
     * Review the specified resource from storage permanently.
     *
     * @param  \Experience\Requests\ExperienceRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function review(ReviewRequest $request, $id)
    {
        $review = New Review();
        $review->user()->associate(User::find($request->input('user_id')));
        $review->body = $request->input('body');
        $review->delta = $request->input('delta');
        $review->rating = $request->input('rating');
        $review->approved = true;

        $experience = Roadtrip::withoutGlobalScopes()->findOrFail($id);
        $experience->reviews()->save($review);
        $experience->rating = Review::compute($id, get_class(new Roadtrip));
        $experience->save();

        return back();
    }
}

<?php

namespace Experience\Controllers;

use Catalogue\Models\Catalogue;
use Category\Models\Category;
use Experience\Models\Amenity;
use Experience\Models\Availability;
use Experience\Models\Experience;
use Experience\Models\Rating;
use Experience\Requests\ExperienceRequest;
use Frontier\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Review\Models\Review;
use Review\Requests\ReviewRequest;
use User\Models\User;

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
        $experience->body = $request->input('body');
        $experience->delta = $request->input('delta');
        $experience->map = $request->input('map');
        $experience->map_instructions = $request->input('map_instructions');
        $experience->price = $request->input('price');
        $experience->feature = $request->input('feature');
        $experience->type = 'experience';
        $experience->user()->associate(User::find($request->input('user')));

        $start_date = date('Y-m-d H:i:s', strtotime($request->input('availabilities')[0]['date_start']));
        $end = end($request->input('availabilities'));
        reset($request->input('availabilities'));
        $end_date = date('Y-m-d H:i:s', strtotime($end['date_end']));
        $experience->date_start = $start_date;
        $experience->date_end = $end_date;

        $experience->save();
        $experience->amenities()->attach($request->input('amenities'));

        foreach ($request->input('availabilities') as $i => $availabilities) {

            $availability = new Availability();
            $availability->name = $request->input('name');
            $availability->description = @$availabilities['description'];
            $availability->date_start = $availabilities['date_start'];
            $availability->date_end = $availabilities['date_end'];
            // $availability->days = $availabilities['days'];
            $availability->save();
            $experience->availabilities()->save($availability);
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
        $experience = Experience::findOrFail($id);
        $experience->name = $request->input('name');
        $experience->code = $request->input('code');
        $experience->reference_number = $request->input('reference_number');

        $start_date = date('Y-m-d H:i:s', strtotime($request->input('availabilities')[0]['date_start']));
        $end = end($request->input('availabilities'));
        reset($request->input('availabilities'));
        $end_date = date('Y-m-d H:i:s', strtotime($end['date_end']));
        $experience->date_start = $start_date;
        $experience->date_end = $end_date;

        $experience->body = $request->input('body');
        $experience->delta = $request->input('delta');
        $experience->map = $request->input('map');
        $experience->map_instructions = $request->input('map_instructions');
        $experience->price = $request->input('price');
        $experience->feature = $request->input('feature');
        $experience->user()->associate(User::find($request->input('user')));
        $experience->amenities()->sync($request->input('amenities'));
        $experience->save();

        $availableIds = [];
        foreach ($request->input('availabilities') as $availabilities) {
            $availability = Availability::findOrNew($availabilities['id']);
            $availability->name = $request->input('name');
            $availability->description = @$availabilities['description'];
            $availability->date_start = $availabilities['date_start'];
            $availability->date_end = $availabilities['date_end'];
            // $availability->days = $availabilities['days'];
            $availability->save();
            $experience->availabilities()->save($availability);
            $availableIds[] = $availability->id;
        }
        $experience->availabilities()->whereNotIn('id', $availableIds)->delete();

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
        Experience::destroy($request->has('id') ? $request->input('id') : $id);

        return back();
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return Illuminate\Http\Response
     */
    public function trashed(Request $request)
    {
        $resources = Experience::onlyTrashed()
                         ->search($request->all())
                         ->paginate();

        return view("Experience::experiences.trashed")->with(compact('resources'));
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \Experience\Requests\ExperienceRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request, $id = null)
    {
        $experiences = Experience::onlyTrashed()
                     ->whereIn('id', $request->has('id') ? $request->input('id') : [$id])
                     ->get();

        foreach ($experiences as $experience) {
            $experience->restore();
        }

        return back();
    }

    /**
     * Delete the specified resource from storage permanently.
     *
     * @param  \Experience\Requests\ExperienceRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $experiences = Experience::onlyTrashed()
                     ->whereIn('id', $request->has('id') ? $request->input('id') : [$id])
                     ->get();

        foreach ($experiences as $experience) {
            $experience->forceDelete();
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

        $experience = Experience::findOrFail($id);
        $experience->reviews()->save($review);
        $experience->rating = Review::compute($id, get_class(new Experience));
        $experience->save();

        return back();
    }
}

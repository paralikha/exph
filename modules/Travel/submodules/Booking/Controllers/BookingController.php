<?php

namespace Booking\Controllers;

use Catalogue\Models\Catalogue;
use Category\Models\Category;
use Booking\Models\Booking;
use Booking\Requests\BookingRequest;
use Experience\Models\Rating;
use Frontier\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Review\Models\Review;
use Review\Requests\ReviewRequest;
use User\Models\User;

class BookingController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $resources = Booking::paginate();

        if (null !== $request->get('date_from') && null !== $request->get('date_to')) {
            $resources = Booking::whereBetween('date_start', [$request->get('date_from'), $request->get('date_to')])->paginate();
        }

        return view("Theme::bookings.index")->with(compact('resources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catalogues = Catalogue::mediabox();
        $categories = Category::type('booking')->pluck('name', 'id');
        $managers = User::thatIs(['superadmin', 'travel-manager', 'manager'])->get();

        return view("Theme::bookings.create")->with(compact('catalogues', 'categories', 'managers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Booking\Requests\BookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request)
    {
        $booking = new Booking();
        $booking->name = $request->input('name');
        $booking->code = $request->input('code');
        $booking->body = $request->input('body');
        $booking->price = $request->input('price');
        $booking->delta = $request->input('delta');
        $booking->map = $request->input('map');
        $booking->map_instructions = $request->input('map_instructions');
        $booking->feature = $request->input('feature');
        $booking->user()->associate(User::find($request->input('user')));
        $booking->save();

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
        $resource = Booking::findOrFail($id);
        $catalogues = Catalogue::mediabox();
        $categories = Category::type('booking')->get(['name', 'id'])->toArray();
        $managers = User::thatIs(['superadmin', 'travel-manager', 'manager'])->get();

        return view("Theme::bookings.edit")->with(compact('resource', 'catalogues', 'categories', 'managers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Booking\Requests\BookingRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookingRequest $request, $id)
    {
        // echo "<pre>";
        //     var_dump( $request->all() ); die();
        // echo "</pre>";
        $booking = Booking::findOrFail($id);
        $booking->name = $request->input('name');
        $booking->code = $request->input('code');
        $booking->body = $request->input('body');
        $booking->price = $request->input('price');
        $booking->delta = $request->input('delta');
        $booking->map = $request->input('map');
        $booking->map_instructions = $request->input('map_instructions');
        $booking->feature = $request->input('feature');
        $booking->user()->associate(User::find($request->input('user')));
        $booking->save();

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

        return redirect()->route('bookings.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        //

        return view("Theme::bookings.trash");
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \Booking\Requests\BookingRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(BookingRequest $request, $id)
    {
        //

        return back();
    }

    /**
     * Delete the specified resource from storage permanently.
     *
     * @param  \Booking\Requests\BookingRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(BookingRequest $request, $id)
    {
        //

        return redirect()->route('bookings.trash');
    }

    /**
     * Review the specified resource from storage permanently.
     *
     * @param  \Booking\Requests\BookingRequest  $request
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

        $booking = Booking::findOrFail($id);
        $booking->reviews()->save($review);
        $booking->rating = Review::compute($id, get_class(new Booking));
        $booking->save();

        return back();
    }
}

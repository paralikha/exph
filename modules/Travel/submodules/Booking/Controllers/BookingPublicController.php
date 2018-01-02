<?php

namespace Booking\Controllers;

use Booking\Models\Booking;
use Booking\Requests\BookingRequest;
use Illuminate\Http\Request;
use Pluma\Controllers\Controller;

class BookingPublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
        $resources = Booking::orderBy('created_at', 'DESC')->paginate();

        return view("Theme::bookings.all")->with(compact('resources'));
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
        $resource = Booking::whereCode($slug)->first();

        return view("Theme::bookings.show")->with(compact('resource'));
    }

    /**
     * Generate random booking.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function yolo(Request $request)
    {
        $resource = Booking::all()->random(1)->first();

        return view("Theme::bookings.show")->with(compact('resource'));
    }
}

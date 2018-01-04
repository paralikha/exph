<?php

namespace Roadtrip\Controllers;

use Roadtrip\Models\Roadtrip;
use Roadtrip\Requests\RoadtripRequest;
use Illuminate\Http\Request;
use Pluma\Controllers\Controller;

class RoadtripPublicController extends Controller
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
     * Generate random roadtrip.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function yolo(Request $request)
    {
        $resource = Roadtrip::all()->random(1)->first();

        return view("Theme::roadtrips.show")->with(compact('resource'));
    }
}

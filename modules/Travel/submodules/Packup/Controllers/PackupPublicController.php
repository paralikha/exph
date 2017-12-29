<?php

namespace Packup\Controllers;

use Packup\Models\Packup;
use Packup\Requests\PackupRequest;
use Illuminate\Http\Request;
use Pluma\Controllers\Controller;

class PackupPublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
        $resources = Packup::paginate();
        if (null !== $request->get('date_from') && null !== $request->get('date_to')) {
            $resources = Packup::whereBetween('date_start', [$request->get('date_from'), $request->get('date_to')])->paginate();
        }

        return view("Theme::packups.all")->with(compact('resources'));
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
        $resource = Packup::whereCode($slug)->first();

        return view("Theme::packups.show")->with(compact('resource'));
    }

    /**
     * Generate random packup.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function yolo(Request $request)
    {
        $resource = Packup::all()->random(1)->first();

        return view("Theme::packups.show")->with(compact('resource'));
    }
}

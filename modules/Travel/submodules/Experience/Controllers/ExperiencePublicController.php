<?php

namespace Experience\Controllers;

use Category\Models\Category;
use Experience\Models\Experience;
use Experience\Requests\ExperienceRequest;
use Illuminate\Http\Request;
use Pluma\Controllers\Controller;

class ExperiencePublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
        $resources = Experience::paginate();
        if (null !== $request->get('date_from') && null !== $request->get('date_to')) {
            $resources = Experience::whereBetween('date_start', [$request->get('date_from'), $request->get('date_to')])->paginate();
        }

        return view("Theme::experiences.all")->with(compact('resources'));
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
        $resource = Experience::whereCode($slug)->first();

        return view("Theme::experiences.show")->with(compact('resource', 'categories'));
    }

    /**
     * Generate random experience.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function yolo(Request $request)
    {
        $resource = Experience::all()->random(1)->first();

        return view("Theme::experiences.show")->with(compact('resource'));
    }
}

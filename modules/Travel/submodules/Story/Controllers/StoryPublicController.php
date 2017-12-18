<?php

namespace Story\Controllers;

use Frontier\Controllers\PublicController;
use Illuminate\Http\Request;
use Story\Models\Story;
use Story\Requests\StoryRequest;

class StoryPublicController extends PublicController
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
        $resources = Story::orderBy('created_at', 'DESC')->paginate();

        return view("Theme::templates.stories")->with(compact('resources'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $code = null)
    {
        $resource = Story::whereCode($code)->firstOrFail();
        // get previous resource id
        $previous = Story::where('id', '<', $resource->id)->first();
        // get next resource id
        $next = Story::where('id', '>', $resource->id)->first();

        return view("Theme::stories.show")->with(compact('resource', 'previous', 'next'));
    }
}

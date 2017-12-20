<?php

namespace Review\Controllers;

use Frontier\Controllers\AdminController;
use Illuminate\Http\Request;
use Review\Models\Review;
use Review\Requests\ReviewRequest;

class ReviewController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($resources);
        $resources = Review::paginate();
        $trashed = Review::onlyTrashed()->count();

        return view("Theme::reviews.index")->with(compact('resources', 'trashed'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $resource = Review::findOrFail($id);
        $trashed = Review::onlyTrashed()->count();

        return view("Theme::reviews.show")->with(compact('resource', 'trashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view("Theme::reviews.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Review\Requests\ReviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewRequest $request)
    {
        $review = new Review();
        $review->name = $request->input('name');
        $review->alias = $request->input('alias');
        $review->code = $request->input('code');
        $review->description = $request->input('description');
        if (null !== $request->input('schedule')) {
            $review->schedule = date('Y-m-d H:i:s', strtotime($request->input('schedule')));
        }
        $review->save();

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
        $resource = Review::findOrFail($id);

        return view("Theme::reviews.edit")->with(compact('resource'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Review\Requests\ReviewRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReviewRequest $request, $id)
    {
        $review = Review::findOrFail($id);
        $review->name = $request->input('name');
        $review->alias = $request->input('alias');
        $review->code = $request->input('code');
        $review->description = $request->input('description');
        if (null !== $request->input('schedule')) {
            $review->schedule = date('Y-m-d H:i:s', strtotime($request->input('schedule')));
        }
        $review->save();

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
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('reviews.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $resources = Review::onlyTrashed()->paginate();

        return view("Theme::reviews.trash")->with(compact('resources'));
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \Review\Requests\ReviewRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request, $id)
    {
        $review = Review::onlyTrashed()->findOrFail($id);
        $review->restore();

        return back();
    }

    /**
     * Delete the specified resource from storage permanently.
     *
     * @param  \Review\Requests\ReviewRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $review = Review::withTrashed()->findOrFail($id);
        $review->forceDelete();

        return redirect()->route('reviews.trash');
    }
}

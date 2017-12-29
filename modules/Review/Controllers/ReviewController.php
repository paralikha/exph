<?php

namespace Review\Controllers;

use Frontier\Controllers\AdminController;
use Illuminate\Http\Request;
use Review\Models\Review;
use Review\Requests\ReviewRequest;
use User\Models\User;

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
        $resources = Review::paginate();

        return view("Theme::reviews.index")->with(compact('resources'));
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
        //

        return view("Theme::reviews.show");
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
        $review->body = $request->input('body');
        $review->delta = $request->input('delta');
        $review->approved = $request->input('approved');
        $review->upvotes = $request->input('upvotes');
        $review->user()->associate(User::find(user()->id));
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

        return view("Theme::reviews.edit");
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
        $review->body = $request->input('body');
        $review->delta = $request->input('delta');
        $review->approved = $request->input('approved');
        $review->upvotes = $request->input('upvotes');
        $review->user()->associate(User::find(user()->id));
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

        return view("Theme::reviews.trash")->with(compact('trashed'));
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \Review\Requests\ReviewRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(ReviewRequest $request, $id)
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
    public function delete(ReviewRequest $request, $id)
    {
        $review = Review::withTrashed()->findOrFail($id);
        $review->forceDelete();

        return redirect()->route('reviews.trash');
    }
}

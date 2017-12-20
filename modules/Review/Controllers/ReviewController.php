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
        //

        return view("Theme::reviews.index");
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
        //

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
        //

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
        //

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

        return redirect()->route('reviews.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        //

        return view("Theme::reviews.trash");
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
        //

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
        //

        return redirect()->route('reviews.trash');
    }
}

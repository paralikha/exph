<?php

namespace Review\Controllers;

use Frontier\Controllers\AdminController;
use Illuminate\Http\Request;
use Review\Models\Review;

class ReviewManyController extends AdminController
{
    /**
     * Restore the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        foreach ($request->input('reviews') as $id) {
            $review = Review::onlyTrashed()->findOrFail($id);
            $review->restore();
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        foreach ($request->input('reviews') as $id) {
            $review = Review::findOrFail($id);
            $review->delete();
        }

        return redirect()->route('reviews.index');
    }

    /**
     * Delete the specified resource from storage permanently.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        foreach ($request->input('reviews') as $id) {
            $review = Review::withTrashed()->findOrFail($id);
            $review->forceDelete();
        }

        return back();
    }
}

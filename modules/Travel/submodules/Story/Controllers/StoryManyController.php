<?php

namespace Story\Controllers;

use Frontier\Controllers\AdminController;
use Illuminate\Http\Request;
use Story\Models\Story;

class StoryManyController extends AdminController
{
    /**
     * Restore the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        foreach ($request->input('stories') as $id) {
            $story = Story::onlyTrashed()->findOrFail($id);
            $story->restore();
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
        foreach ($request->input('stories') as $id) {
            $story = Story::findOrFail($id);
            $story->delete();
        }

        return redirect()->route('stories.index');
    }

    /**
     * Delete the specified resource from storage permanently.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        foreach ($request->input('stories') as $id) {
            $story = Story::withTrashed()->findOrFail($id);
            $story->forceDelete();
        }

        return back();
    }
}

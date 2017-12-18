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
        foreach ($request->input('roles') as $id) {
            $role = Story::onlyTrashed()->findOrFail($id);
            $role->restore();
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
        foreach ($request->input('roles') as $id) {
            $role = Story::findOrFail($id);
            $role->delete();
        }

        return redirect()->route('roles.index');
    }

    /**
     * Delete the specified resource from storage permanently.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        foreach ($request->input('roles') as $id) {
            $role = Story::withTrashed()->findOrFail($id);
            $role->forceDelete();
        }

        return back();
    }
}

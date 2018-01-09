<?php

namespace Experience\Controllers;

use Frontier\Controllers\AdminController;
use Illuminate\Http\Request;
use Experience\Models\Experience;

class ExperienceManyController extends AdminController
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        foreach ($request->input('experiences') as $id) {
            $experience = Experience::findOrFail($id);
            $experience->delete();
        }

        return back();
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        foreach ($request->input('experiences') as $id) {
            $experience = Experience::onlyTrashed()->findOrFail($id);
            $experience->restore();
        }

        return back();
    }
}

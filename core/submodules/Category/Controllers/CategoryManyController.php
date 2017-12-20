<?php

namespace Category\Controllers;

use Frontier\Controllers\AdminController;
use Illuminate\Http\Request;
use Category\Models\Category;

class CategoryManyController extends AdminController
{
    /**
     * Restore the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        foreach ($request->input('categories') as $id) {
            $category = Category::onlyTrashed()->findOrFail($id);
            $category->restore();
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
        foreach ($request->input('categories') as $id) {
            $category = Category::findOrFail($id);
            $category->delete();
        }

        return redirect()->route('categories.index');
    }

    /**
     * Delete the specified resource from storage permanently.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        foreach ($request->input('categories') as $id) {
            $category = Category::withTrashed()->findOrFail($id);
            $category->forceDelete();
        }

        return back();
    }
}

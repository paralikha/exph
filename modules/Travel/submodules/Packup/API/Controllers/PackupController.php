<?php

namespace Packup\API\Controllers;

use Packup\Models\Packup;
use Packup\Models\Rating;
use Illuminate\Http\Request;
use Pluma\API\Controllers\APIController;

class PackupController extends APIController
{
    /**
     * Search the resource.
     *
     * @param  Request $request
     * @return Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $onlyTrashed = $request->get('trashedOnly') !== 'null' && $request->get('trashedOnly') ? $request->get('trashedOnly'): false;
        $order = $request->get('descending') === 'true' && $request->get('descending') !== 'null' ? 'DESC' : 'ASC';
        $search = $request->get('q') !== 'null' && $request->get('q') ? $request->get('q'): '';
        $sort = $request->get('sort') && $request->get('sort') !== 'null' ? $request->get('sort') : 'id';
        $take = $request->get('take') && $request->get('take') > 0 ? $request->get('take') : 0;

        $resources = Packup::search($search)->orderBy($sort, $order);
        if ($onlyTrashed) {
            $resources->onlyTrashed();
        }
        $resources = $resources->paginate($take);

        return response()->json($resources);
    }

    /**
     * Get all resources.
     *
     * @param  Illuminate\Http\Request $request [description]
     * @return Illuminate\Http\Response
     */
    public function all(Request $request)
    {
        $onlyTrashed = $request->get('trashedOnly') !== 'null' && $request->get('trashedOnly') ? $request->get('trashedOnly'): false;
        $order = $request->get('descending') === 'true' && $request->get('descending') !== 'null' ? 'DESC' : 'ASC';
        $search = $request->get('q') !== 'null' && $request->get('q') ? $request->get('q'): '';
        $sort = $request->get('sort') && $request->get('sort') !== 'null' ? $request->get('sort') : 'id';
        $take = $request->get('take') && $request->get('take') > 0 ? $request->get('take') : 0;

        $resources = Packup::search($search)->orderBy($sort, $order);
        if ($onlyTrashed) {
            $resources->onlyTrashed();
        }
        $resources = $resources->paginate($take);

        return response()->json($resources);
    }

    /**
     * Get all resources.
     *
     * @param  Illuminate\Http\Request $request [description]
     * @return Illuminate\Http\Response
     */
    public function getTrash(Request $request)
    {
        $search = $request->get('q') !== 'null' && $request->get('q') ? $request->get('q'): '';
        $take = $request->get('take') && $request->get('take') > 0 ? $request->get('take') : 0;
        $sort = $request->get('sort') && $request->get('sort') !== 'null' ? $request->get('sort') : 'id';
        $order = $request->get('descending') === 'true' && $request->get('descending') !== 'null' ? 'DESC' : 'ASC';

        $permissions = Packup::search($search)->orderBy($sort, $order)->onlyTrashed()->paginate($take);

        return response()->json($permissions);
    }

    /**
     * Gets the grants.
     *
     * @param  array $modules
     * @return void
     */
    public function grants($modules = null)
    {
        $grants = Grant::pluck('name', 'id');

        return response()->json($grants);
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
        $page = Packup::findOrFail($id);

        if (in_array($page->code, config('auth.rootpages', []))) {
            $this->errorResponse['text'] = "Deleting Root Packups is not permitted";

            return response()->json($this->errorResponse);
        }

        $this->successResponse['text'] = "{$page->name} moved to trash.";
        $page->delete();

        return response()->json($this->successResponse);
    }

    /**
     * Copy the resource as a new resource.
     * @param  Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function clone(Request $request, $id)
    {
        $page = Packup::findOrFail($id);

        $clone = new Packup();
        $clone->name = $page->name;
        $clone->code = "{$page->code}-clone-".rand((int) $id, (int) date('Y'));
        $clone->description = $page->description;
        $clone->save();
        $clone->grants()->attach($page->grants->pluck('id')->toArray());

        return response()->json($this->successResponse);
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request, $id)
    {
        $page = Packup::onlyTrashed()->findOrFail($id);
        $page->restore();

        return response()->json($this->successResponse);
    }

    /**
     * Delete the specified resource from storage permanently.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $page = Packup::withTrashed()->findOrFail($id);
        $page->forceDelete();

        return response()->json($this->successResponse);
    }

    /**
     * Rate.
     * @param  Request $request
     * @return            [description]
     */
    public function rate(Request $request, $id)
    {
        $packup = Packup::find($id);
        $packup->ratings()->save(Rating::updateOrCreate(['user_id' => $request->input('user_id')], $request->except(['_token'])));
        $packup->rating = Rating::compute($packup->id, get_class(new Packup));
        $packup->save();

        return response()->json($this->successResponse);
    }
}

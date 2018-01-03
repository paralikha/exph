<?php

namespace Booking\API\Controllers;

use Booking\Models\Booking;
use Booking\Models\Rating;
use Illuminate\Http\Request;
use Pluma\API\Controllers\APIController;

class BookingController extends APIController
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

        $resources = Booking::search($search)->orderBy($sort, $order);
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

        $resources = Booking::search($search)->orderBy($sort, $order);
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

        $permissions = Booking::search($search)->orderBy($sort, $order)->onlyTrashed()->paginate($take);

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
        $booking = Booking::findOrFail($id);

        if (in_array($booking->code, config('auth.rootbookings', []))) {
            $this->errorResponse['text'] = "Deleting Root Bookings is not permitted";

            return response()->json($this->errorResponse);
        }

        $this->successResponse['text'] = "{$booking->name} moved to trash.";
        $booking->delete();

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
        $booking = Booking::findOrFail($id);

        $clone = new Booking();
        $clone->name = $booking->name;
        $clone->code = "{$booking->code}-clone-".rand((int) $id, (int) date('Y'));
        $clone->description = $booking->description;
        $clone->save();
        $clone->grants()->attach($booking->grants->pluck('id')->toArray());

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
        $booking = Booking::onlyTrashed()->findOrFail($id);
        $booking->restore();

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
        $booking = Booking::withTrashed()->findOrFail($id);
        $booking->forceDelete();

        return response()->json($this->successResponse);
    }

    /**
     * Rate.
     * @param  Request $request
     * @return            [description]
     */
    public function rate(Request $request, $id)
    {
        $booking = Booking::find($id);
        $booking->ratings()->save(Rating::updateOrCreate(['user_id' => $request->input('user_id')], $request->except(['_token'])));
        $booking->rating = Rating::compute($booking->id, get_class(new Booking));
        $booking->save();

        return response()->json($this->successResponse);
    }
}

<?php

namespace Travel\API\Controllers;

use Illuminate\Http\Request;
use Pluma\API\Controllers\APIController;
use Travel\Models\Transaction;

class TransactionController extends APIController
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

        $resources = Transaction::search($search)->where('customer_id', user()->id ?? $request->get('user_id'))->orderBy($sort, $order);
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
        $groupBy = $request->get('group_by') ? $request->get('group_by') : false;

        $resources = Transaction::search($search)->where('customer_id', user()->id ?? $request->get('user_id'))->orderBy($sort, $order);
        if ($groupBy) {
            $resources->groupBy($groupBy);
        }
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

        $transaction = Transaction::where('customer_id', user()->id ?? $request->get('user_id'))->search($search)->orderBy($sort, $order)->onlyTrashed()->paginate($take);

        return response()->json($transaction);
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
        $transaction = Transaction::findOrFail($id);

        if (in_array($transaction->code, config('auth.roottransactions', []))) {
            $this->errorResponse['text'] = "Deleting Root Transactions is not permitted";

            return response()->json($this->errorResponse);
        }

        $this->successResponse['text'] = "{$transaction->name} moved to trash.";
        $transaction->delete();

        return response()->json($this->successResponse);
        // return redirect()->route('transactions.index');
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
        $transaction = Transaction::onlyTrashed()->findOrFail($id);
        $transaction->restore();

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
        $transaction = Transaction::withTrashed()->findOrFail($id);
        $transaction->forceDelete();

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

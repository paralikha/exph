<?php

namespace Transaction\Controllers;

use Frontier\Controllers\AdminController;
use Illuminate\Http\Request;
use Transaction\Models\Transaction;

class TransactionManyController extends AdminController
{
    /**
     * Restore the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        foreach ($request->input('transactions') as $id) {
            $transaction = Transaction::onlyTrashed()->findOrFail($id);
            $transaction->restore();
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
        foreach ($request->input('transactions') as $id) {
            $transaction = Transaction::findOrFail($id);
            $transaction->delete();
        }

        return redirect()->route('transactions.index');
    }

    /**
     * Delete the specified resource from storage permanently.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        foreach ($request->input('transactions') as $id) {
            $transaction = Transaction::withTrashed()->findOrFail($id);
            $transaction->forceDelete();
        }

        return back();
    }
}

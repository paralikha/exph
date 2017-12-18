<?php

namespace Transaction\Observers;

use Transaction\Models\Transaction;

class TransactionObserver
{
    /**
     * Listen to the TransactionObserver created event.
     *
     * @param  \Transaction\Models\Transaction  $resource
     * @return void
     */
    public function created(Transaction $resource)
    {
        // save fields
        session()->flash('title', $resource->name);
        session()->flash('message', "Transaction successfully created");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the TransactionObserver updated event.
     *
     * @param  \Transaction\Models\Transaction  $resource
     * @return void
     */
    public function updated(Transaction $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Transaction successfully updated");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the TransactionObserver deleted event.
     *
     * @param  \Transaction\Models\Transaction  $resource
     * @return void
     */
    public function deleted(Transaction $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Transaction successfully removed");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the TransactionObserver restored event.
     *
     * @param  \Transaction\Models\Transaction  $resource
     * @return void
     */
    public function restored(Transaction $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Transaction successfully restored");
        session()->flash('type', 'success');
    }
}

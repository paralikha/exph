<?php

namespace Cashier\Observers;

use Cashier\Models\Cashier;

class CashierObserver
{
    /**
     * Listen to the CashierObserver created event.
     *
     * @param  \Cashier\Models\Cashier  $resource
     * @return void
     */
    public function created(Cashier $resource)
    {
        // save fields
        session()->flash('title', $resource->name);
        session()->flash('message', "Cashier successfully created");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the CashierObserver updated event.
     *
     * @param  \Cashier\Models\Cashier  $resource
     * @return void
     */
    public function updated(Cashier $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Cashier successfully updated");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the CashierObserver deleted event.
     *
     * @param  \Cashier\Models\Cashier  $resource
     * @return void
     */
    public function deleted(Cashier $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Cashier successfully removed");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the CashierObserver restored event.
     *
     * @param  \Cashier\Models\Cashier  $resource
     * @return void
     */
    public function restored(Cashier $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Cashier successfully restored");
        session()->flash('type', 'success');
    }
}

<?php

namespace Billing\Observers;

use Billing\Models\Billing;

class BillingObserver
{
    /**
     * Listen to the BillingObserver created event.
     *
     * @param  \Billing\Models\Billing  $resource
     * @return void
     */
    public function created(Billing $resource)
    {
        // save fields
        session()->flash('title', $resource->name);
        session()->flash('message', "Billing successfully created");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the BillingObserver updated event.
     *
     * @param  \Billing\Models\Billing  $resource
     * @return void
     */
    public function updated(Billing $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Billing successfully updated");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the BillingObserver deleted event.
     *
     * @param  \Billing\Models\Billing  $resource
     * @return void
     */
    public function deleted(Billing $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Billing successfully removed");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the BillingObserver restored event.
     *
     * @param  \Billing\Models\Billing  $resource
     * @return void
     */
    public function restored(Billing $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Billing successfully restored");
        session()->flash('type', 'success');
    }
}

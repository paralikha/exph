<?php

namespace Customer\Observers;

use Customer\Models\Customer;

class CustomerObserver
{
    /**
     * Listen to the CustomerObserver created event.
     *
     * @param  \Customer\Models\Customer  $resource
     * @return void
     */
    public function created(Customer $resource)
    {
        // save fields
        session()->flash('title', $resource->name);
        session()->flash('message', "Customer successfully created");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the CustomerObserver updated event.
     *
     * @param  \Customer\Models\Customer  $resource
     * @return void
     */
    public function updated(Customer $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Customer successfully updated");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the CustomerObserver deleted event.
     *
     * @param  \Customer\Models\Customer  $resource
     * @return void
     */
    public function deleted(Customer $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Customer successfully removed");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the CustomerObserver restored event.
     *
     * @param  \Customer\Models\Customer  $resource
     * @return void
     */
    public function restored(Customer $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Customer successfully restored");
        session()->flash('type', 'success');
    }
}

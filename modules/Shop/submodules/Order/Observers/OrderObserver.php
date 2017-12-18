<?php

namespace Order\Observers;

use Order\Models\Order;

class OrderObserver
{
    /**
     * Listen to the OrderObserver created event.
     *
     * @param  \Order\Models\Order  $resource
     * @return void
     */
    public function created(Order $resource)
    {
        // save fields
        session()->flash('title', $resource->name);
        session()->flash('message', "Order successfully created");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the OrderObserver updated event.
     *
     * @param  \Order\Models\Order  $resource
     * @return void
     */
    public function updated(Order $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Order successfully updated");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the OrderObserver deleted event.
     *
     * @param  \Order\Models\Order  $resource
     * @return void
     */
    public function deleted(Order $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Order successfully removed");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the OrderObserver restored event.
     *
     * @param  \Order\Models\Order  $resource
     * @return void
     */
    public function restored(Order $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Order successfully restored");
        session()->flash('type', 'success');
    }
}

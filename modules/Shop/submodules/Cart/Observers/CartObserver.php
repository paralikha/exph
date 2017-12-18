<?php

namespace Cart\Observers;

use Cart\Models\Cart;

class CartObserver
{
    /**
     * Listen to the CartObserver created event.
     *
     * @param  \Cart\Models\Cart  $resource
     * @return void
     */
    public function created(Cart $resource)
    {
        // save fields
        session()->flash('title', $resource->name);
        session()->flash('message', "Cart successfully created");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the CartObserver updated event.
     *
     * @param  \Cart\Models\Cart  $resource
     * @return void
     */
    public function updated(Cart $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Cart successfully updated");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the CartObserver deleted event.
     *
     * @param  \Cart\Models\Cart  $resource
     * @return void
     */
    public function deleted(Cart $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Cart successfully removed");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the CartObserver restored event.
     *
     * @param  \Cart\Models\Cart  $resource
     * @return void
     */
    public function restored(Cart $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Cart successfully restored");
        session()->flash('type', 'success');
    }
}

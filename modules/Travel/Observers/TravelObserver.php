<?php

namespace Travel\Observers;

use Travel\Models\Travel;

class TravelObserver
{
    /**
     * Listen to the TravelObserver created event.
     *
     * @param  \Travel\Models\Travel  $resource
     * @return void
     */
    public function created(Travel $resource)
    {
        // save fields
        session()->flash('title', $resource->name);
        session()->flash('message', "Travel successfully created");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the TravelObserver updated event.
     *
     * @param  \Travel\Models\Travel  $resource
     * @return void
     */
    public function updated(Travel $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Travel successfully updated");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the TravelObserver deleted event.
     *
     * @param  \Travel\Models\Travel  $resource
     * @return void
     */
    public function deleted(Travel $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Travel successfully removed");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the TravelObserver restored event.
     *
     * @param  \Travel\Models\Travel  $resource
     * @return void
     */
    public function restored(Travel $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Travel successfully restored");
        session()->flash('type', 'success');
    }
}

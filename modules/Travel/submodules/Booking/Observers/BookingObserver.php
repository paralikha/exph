<?php

namespace Booking\Observers;

use Booking\Models\Booking;

class BookingObserver
{
    /**
     * Listen to the BookingObserver created event.
     *
     * @param  \Booking\Models\Booking  $resource
     * @return void
     */
    public function created(Booking $resource)
    {
        // save fields
        session()->flash('title', $resource->name);
        session()->flash('message', "Booking successfully created");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the BookingObserver updated event.
     *
     * @param  \Booking\Models\Booking  $resource
     * @return void
     */
    public function updated(Booking $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Booking successfully updated");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the BookingObserver deleted event.
     *
     * @param  \Booking\Models\Booking  $resource
     * @return void
     */
    public function deleted(Booking $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Booking successfully removed");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the BookingObserver restored event.
     *
     * @param  \Booking\Models\Booking  $resource
     * @return void
     */
    public function restored(Booking $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Booking successfully restored");
        session()->flash('type', 'success');
    }
}

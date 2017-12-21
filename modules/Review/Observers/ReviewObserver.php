<?php

namespace Review\Observers;

use Review\Models\Review;

class ReviewObserver
{
    /**
     * Listen to the ReviewObserver created event.
     *
     * @param  \Review\Models\Review  $resource
     * @return void
     */
    public function created(Review $resource)
    {
        // save fields
        session()->flash('title', $resource->name);
        session()->flash('message', "Review successfully created");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the ReviewObserver updated event.
     *
     * @param  \Review\Models\Review  $resource
     * @return void
     */
    public function updated(Review $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Review successfully updated");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the ReviewObserver deleted event.
     *
     * @param  \Review\Models\Review  $resource
     * @return void
     */
    public function deleted(Review $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Review successfully removed");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the ReviewObserver restored event.
     *
     * @param  \Review\Models\Review  $resource
     * @return void
     */
    public function restored(Review $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Review successfully restored");
        session()->flash('type', 'success');
    }
}

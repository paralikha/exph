<?php

namespace Packup\Observers;

use Packup\Models\Packup;

class PackupObserver
{
    /**
     * Listen to the PackupObserver created event.
     *
     * @param  \Packup\Models\Packup  $resource
     * @return void
     */
    public function created(Packup $resource)
    {
        // save fields
        session()->flash('title', $resource->name);
        session()->flash('message', "Packup successfully created");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the PackupObserver updated event.
     *
     * @param  \Packup\Models\Packup  $resource
     * @return void
     */
    public function updated(Packup $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Packup successfully updated");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the PackupObserver deleted event.
     *
     * @param  \Packup\Models\Packup  $resource
     * @return void
     */
    public function deleted(Packup $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Packup successfully removed");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the PackupObserver restored event.
     *
     * @param  \Packup\Models\Packup  $resource
     * @return void
     */
    public function restored(Packup $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Packup successfully restored");
        session()->flash('type', 'success');
    }
}

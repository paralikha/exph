<?php

namespace Roadtrip\Observers;

use Roadtrip\Models\Roadtrip;

class RoadtripObserver
{
    /**
     * Listen to the RoadtripObserver created event.
     *
     * @param  \Roadtrip\Models\Roadtrip  $resource
     * @return void
     */
    public function created(Roadtrip $resource)
    {
        // save fields
        session()->flash('title', $resource->name);
        session()->flash('message', "Roadtrip successfully created");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the RoadtripObserver updated event.
     *
     * @param  \Roadtrip\Models\Roadtrip  $resource
     * @return void
     */
    public function updated(Roadtrip $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Roadtrip successfully updated");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the RoadtripObserver deleted event.
     *
     * @param  \Roadtrip\Models\Roadtrip  $resource
     * @return void
     */
    public function deleted(Roadtrip $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Roadtrip successfully removed");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the RoadtripObserver restored event.
     *
     * @param  \Roadtrip\Models\Roadtrip  $resource
     * @return void
     */
    public function restored(Roadtrip $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Roadtrip successfully restored");
        session()->flash('type', 'success');
    }
}

<?php

namespace Team\Observers;

use Team\Models\Team;

class TeamObserver
{
    /**
     * Listen to the TeamObserver created event.
     *
     * @param  \Team\Models\Team  $resource
     * @return void
     */
    public function created(Team $resource)
    {
        // save fields
        session()->flash('title', $resource->name);
        session()->flash('message', "Team successfully created");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the TeamObserver updated event.
     *
     * @param  \Team\Models\Team  $resource
     * @return void
     */
    public function updated(Team $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Team successfully updated");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the TeamObserver deleted event.
     *
     * @param  \Team\Models\Team  $resource
     * @return void
     */
    public function deleted(Team $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Team successfully removed");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the TeamObserver restored event.
     *
     * @param  \Team\Models\Team  $resource
     * @return void
     */
    public function restored(Team $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Team successfully restored");
        session()->flash('type', 'success');
    }
}

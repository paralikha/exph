<?php

namespace Experience\Observers;

use Experience\Models\Experience;

class ExperienceObserver
{
    /**
     * Listen to the ExperienceObserver created event.
     *
     * @param  \Experience\Models\Experience  $resource
     * @return void
     */
    public function created(Experience $resource)
    {
        // save fields
        session()->flash('title', $resource->name);
        session()->flash('message', "Experience successfully created");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the ExperienceObserver updated event.
     *
     * @param  \Experience\Models\Experience  $resource
     * @return void
     */
    public function updated(Experience $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Experience successfully updated");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the ExperienceObserver deleted event.
     *
     * @param  \Experience\Models\Experience  $resource
     * @return void
     */
    public function deleted(Experience $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Experience successfully removed");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the ExperienceObserver restored event.
     *
     * @param  \Experience\Models\Experience  $resource
     * @return void
     */
    public function restored(Experience $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Experience successfully restored");
        session()->flash('type', 'success');
    }
}

<?php

namespace Story\Observers;

use Story\Models\Story;

class StoryObserver
{
    /**
     * Listen to the StoryObserver created event.
     *
     * @param  \Story\Models\Story  $resource
     * @return void
     */
    public function created(Story $resource)
    {
        // save fields
        session()->flash('title', $resource->name);
        session()->flash('message', "Story successfully created");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the StoryObserver updated event.
     *
     * @param  \Story\Models\Story  $resource
     * @return void
     */
    public function updated(Story $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Story successfully updated");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the StoryObserver deleted event.
     *
     * @param  \Story\Models\Story  $resource
     * @return void
     */
    public function deleted(Story $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Story successfully removed");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the StoryObserver restored event.
     *
     * @param  \Story\Models\Story  $resource
     * @return void
     */
    public function restored(Story $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Story successfully restored");
        session()->flash('type', 'success');
    }
}

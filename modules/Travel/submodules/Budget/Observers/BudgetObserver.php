<?php

namespace Budget\Observers;

use Budget\Models\Budget;

class BudgetObserver
{
    /**
     * Listen to the BudgetObserver created event.
     *
     * @param  \Budget\Models\Budget  $resource
     * @return void
     */
    public function created(Budget $resource)
    {
        // save fields
        session()->flash('title', $resource->name);
        session()->flash('message', "Budget successfully created");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the BudgetObserver updated event.
     *
     * @param  \Budget\Models\Budget  $resource
     * @return void
     */
    public function updated(Budget $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Budget successfully updated");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the BudgetObserver deleted event.
     *
     * @param  \Budget\Models\Budget  $resource
     * @return void
     */
    public function deleted(Budget $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Budget successfully removed");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the BudgetObserver restored event.
     *
     * @param  \Budget\Models\Budget  $resource
     * @return void
     */
    public function restored(Budget $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Budget successfully restored");
        session()->flash('type', 'success');
    }
}

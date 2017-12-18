<?php

namespace Invoice\Observers;

use Invoice\Models\Invoice;

class InvoiceObserver
{
    /**
     * Listen to the InvoiceObserver created event.
     *
     * @param  \Invoice\Models\Invoice  $resource
     * @return void
     */
    public function created(Invoice $resource)
    {
        // save fields
        session()->flash('title', $resource->name);
        session()->flash('message', "Invoice successfully created");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the InvoiceObserver updated event.
     *
     * @param  \Invoice\Models\Invoice  $resource
     * @return void
     */
    public function updated(Invoice $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Invoice successfully updated");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the InvoiceObserver deleted event.
     *
     * @param  \Invoice\Models\Invoice  $resource
     * @return void
     */
    public function deleted(Invoice $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Invoice successfully removed");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the InvoiceObserver restored event.
     *
     * @param  \Invoice\Models\Invoice  $resource
     * @return void
     */
    public function restored(Invoice $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Invoice successfully restored");
        session()->flash('type', 'success');
    }
}

<?php

namespace Product\Observers;

use Product\Models\Product;

class ProductObserver
{
    /**
     * Listen to the ProductObserver created event.
     *
     * @param  \Product\Models\Product  $resource
     * @return void
     */
    public function created(Product $resource)
    {
        // save fields
        session()->flash('title', $resource->name);
        session()->flash('message', "Product successfully created");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the ProductObserver updated event.
     *
     * @param  \Product\Models\Product  $resource
     * @return void
     */
    public function updated(Product $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Product successfully updated");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the ProductObserver deleted event.
     *
     * @param  \Product\Models\Product  $resource
     * @return void
     */
    public function deleted(Product $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Product successfully removed");
        session()->flash('type', 'success');
    }

    /**
     * Listen to the ProductObserver restored event.
     *
     * @param  \Product\Models\Product  $resource
     * @return void
     */
    public function restored(Product $resource)
    {
        session()->flash('title', $resource->name);
        session()->flash('message', "Product successfully restored");
        session()->flash('type', 'success');
    }
}

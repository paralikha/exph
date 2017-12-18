<?php

namespace Experience\Observers;

use Experience\Models\Amenity;

class AmenityObserver
{
    /**
     * Listen to when saving.
     *
     * @param  \Experience\Models\Amenity  $resource
     * @return void
     */
    public function saving(Amenity $amenity)
    {
        $amenity->categorable_type = Amenity::$categorable;
    }
}

<?php

namespace Booking\Support\Traits;

use Booking\Models\Booking;

trait BelongsToBooking
{
    public function packup()
    {
        return $this->belongsTo(Booking::class);
    }
}

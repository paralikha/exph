<?php

namespace Booking\Support\Traits;

use Booking\Models\Rating;

trait MorphToManyRating
{
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'ratable');
    }
}

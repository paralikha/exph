<?php

namespace Experience\Support\Traits;

use Experience\Models\Rating;

trait MorphToManyRating
{
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'ratable');
    }
}

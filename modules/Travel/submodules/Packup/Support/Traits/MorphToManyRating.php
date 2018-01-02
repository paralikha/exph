<?php

namespace Packup\Support\Traits;

use Packup\Models\Rating;

trait MorphToManyRating
{
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'ratable');
    }
}

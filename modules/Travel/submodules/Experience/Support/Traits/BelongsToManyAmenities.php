<?php

namespace Experience\Support\Traits;

use Experience\Models\Amenity;

trait BelongsToManyAmenities
{
    public function amenities()
    {
        return $this->belongsToMany(Amenity::class);
    }
}

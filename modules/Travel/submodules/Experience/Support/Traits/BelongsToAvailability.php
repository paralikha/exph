<?php

namespace Experience\Support\Traits;

use Experience\Models\Availability;

trait BelongsToAvailability
{
    public function availability()
    {
        return $this->belongsTo(Availability::class);
    }
}

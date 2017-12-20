<?php

namespace Experience\Support\Traits;

use Experience\Models\Experience;

trait BelongsToExperience
{
    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }
}

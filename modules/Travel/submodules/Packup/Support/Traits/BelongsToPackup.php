<?php

namespace Packup\Support\Traits;

use Packup\Models\Packup;

trait BelongsToPackup
{
    public function packup()
    {
        return $this->belongsTo(Packup::class);
    }
}

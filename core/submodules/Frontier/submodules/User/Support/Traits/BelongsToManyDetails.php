<?php

namespace User\Support\Traits;

use User\Models\Detail;

trait BelongsToManyDetails
{
    /**
     * Gets the model this resource has.
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function details()
    {
        return $this->belongsToMany(Detail::class);
    }
}

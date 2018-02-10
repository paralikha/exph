<?php

namespace Travel\Models;

use Experience\Models\Experience;
use Pluma\Models\Model;
use User\Support\Traits\BelongsToUser;

class Wishlist extends Model
{
    use BelongsToUser;

    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }
}

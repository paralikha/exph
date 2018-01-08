<?php

namespace Experience\Models;

use Experience\Support\Traits\BelongsToAvailability;
use Experience\Support\Traits\BelongsToExperience;
use Order\Models\Order as BaseOrder;

class Order extends BaseOrder
{
    use BelongsToExperience, BelongsToAvailability;

    public function getProductAttribute()
    {
        return $this->experience()->withoutGlobalScopes()->first();
    }

    public function getScheduledAttribute()
    {
        $dates = [];
        foreach (unserialize($this->metadata) as $i => $md) {
            $dates['start_date'] = $md['start_date'] ?? '';
            $dates['end_date'] = $md['end_date'] ?? '';
        }

        return $dates;
    }
}

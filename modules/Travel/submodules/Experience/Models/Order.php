<?php

namespace Experience\Models;

use Experience\Support\Traits\BelongsToExperience;
use Order\Models\Order as BaseOrder;

class Order extends BaseOrder
{
    use BelongsToExperience;

}

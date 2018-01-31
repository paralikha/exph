<?php

namespace Order\Support\Relations;

use Order\Models\Order;

trait HasManyOrders
{
    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }
}

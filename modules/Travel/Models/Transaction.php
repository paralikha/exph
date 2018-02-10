<?php

namespace Travel\Models;

use Experience\Support\Traits\BelongsToExperience;
use Illuminate\Database\Eloquent\SoftDeletes;
use Order\Models\Order;

class Transaction extends Order
{
    use SoftDeletes, BelongsToExperience;

    protected $table = 'orders';

    protected $with = ['experience'];

    protected $appends = ['booked'];

    protected $fillable = ['customer_id', 'experience_id', 'price', 'payment_id', 'metadata'];

    protected $searchables = ['created_at', 'updated_at'];

    public function getTypeAttribute()
    {
        return is_null($this->payer_id) ? 'Bank' : 'PayPal';
    }

    public function getAmountAttribute()
    {
        return settings('site_currency.symbol', '₱') . " " . number_format($this->total, 2);
    }

    public function getMetaAttribute()
    {
        return unserialize($this->metadata);
    }

    public function getBookedAttribute()
    {
        return date('F d, Y', strtotime($this->purchased_at));
    }
}

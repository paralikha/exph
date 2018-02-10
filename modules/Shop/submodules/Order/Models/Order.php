<?php

namespace Order\Models;

use Experience\Support\Traits\BelongsToExperience;
use Illuminate\Database\Eloquent\SoftDeletes;
use Pluma\Models\Model;
use Travel\Models\User;
use User\Support\Traits\BelongsToUser;

class Order extends Model
{
    use SoftDeletes, BelongsToExperience;

    protected $with = ['customer', 'experience'];

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

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}

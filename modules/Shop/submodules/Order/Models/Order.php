<?php

namespace Order\Models;

use Carbon\Carbon;
use Experience\Support\Traits\BelongsToExperience;
use Illuminate\Database\Eloquent\SoftDeletes;
use Pluma\Models\Model;
use User\Models\User;

class Order extends Model
{
    use SoftDeletes, BelongsToExperience;

    protected $with = [];

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

    public function getCustomerAttribute()
    {
        return User::find($this->customer_id);
    }

    public function getPurchasedAttribute()
    {
        return Carbon::createFromTimeStamp(strtotime($this->purchased_at))->diffForHumans();
    }
}

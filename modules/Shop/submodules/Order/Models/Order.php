<?php

namespace Order\Models;

use Experience\Support\Traits\BelongsToExperience;
use Illuminate\Database\Eloquent\SoftDeletes;
use Pluma\Models\Model;

class Order extends Model
{
    use SoftDeletes, BelongsToExperience;

    protected $with = [];

    protected $fillable = ['customer_id', 'experience_id', 'price', 'payment_id', 'metadata'];

    protected $searchables = ['created_at', 'updated_at'];
}

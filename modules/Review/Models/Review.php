<?php

namespace Review\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Pluma\Models\Model;
use User\Support\Traits\BelongsToUser;

class Review extends Model
{
    use SoftDeletes, BelongsToUser;

    protected $with = [];

    // protected $fillable = ['user_id'];

    protected $searchables = ['body', 'delta', 'created_at', 'updated_at'];

    public function reviewable()
    {
        return $this->morphTo();
    }
}

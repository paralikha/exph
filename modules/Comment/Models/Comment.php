<?php

namespace Comment\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Pluma\Models\Model;
use User\Support\Traits\BelongsToUser;

class Comment extends Model
{
    use SoftDeletes, BelongsToUser;

    protected $with = [];

    // protected $fillable = ['user_id'];

    protected $searchables = ['body', 'delta', 'created_at', 'updated_at'];

    public function commentable()
    {
        return $this->morphTo();
    }
}

<?php

namespace Review\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Pluma\Models\Model;

class Review extends Model
{
    use SoftDeletes;

    protected $with = [];

    protected $searchables = ['user_id', 'parent_id', 'body', 'delta', 'approved', 'upvotes', 'reviewable_id', 'reviewable_type', 'created_at', 'updated_at'];
}

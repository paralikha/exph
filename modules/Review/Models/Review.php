<?php

namespace Review\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Pluma\Models\Model;

class Review extends Model
{
    use SoftDeletes;

    protected $with = [];

    protected $searchables = ['name', 'alias', 'code', 'description', 'icon', 'created_at', 'updated_at'];
}

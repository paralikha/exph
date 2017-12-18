<?php

namespace Transaction\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Pluma\Models\Model;

class Transaction extends Model
{
    use SoftDeletes;

    protected $with = [];

    protected $searchables = ['name', 'code', 'description', 'created_at', 'updated_at'];
}

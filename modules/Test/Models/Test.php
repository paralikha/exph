<?php

namespace Test\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Pluma\Models\Model;

class Test extends Model
{
    use SoftDeletes;

    protected $with = [];

    protected $searchables = ['body', 'delta', 'created_at', 'updated_at'];
}

<?php

namespace Role\Models;

use Pluma\Models\Model;
use Role\Support\Traits\BelongsToManyGrants;

class Permission extends Model
{
    use BelongsToManyGrants;

    protected $fillable = ['name', 'code', 'description'];

    protected $searchables = ['name', 'code', 'description', 'updated_at', 'created_at'];
}

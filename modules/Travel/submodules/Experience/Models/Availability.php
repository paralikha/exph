<?php

namespace Experience\Models;

use Pluma\Models\Model;

class Availability extends Model
{
    protected $with = [];

    protected $fillable = ['date_start', 'date_end', 'name', 'description'];

    protected $searchables = ['date_start', 'date_end', 'name', 'description', 'created_at', 'updated_at'];

    public function available($value='')
    {
        return $this->morphTo();
    }
}

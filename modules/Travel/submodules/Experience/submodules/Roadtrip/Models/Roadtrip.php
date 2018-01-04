<?php

namespace Roadtrip\Models;

use Experience\Models\Amenity;
use Experience\Models\Experience;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Roadtrip extends Experience
{
    use SoftDeletes;

    protected $table = 'experiences';

    protected $with = [];

    protected $searchables = ['created_at', 'updated_at'];

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'amenity_experience', 'experience_id');
    }

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('type', function (Builder $builder) {
            $builder->where('type', 'roadtrip');
        });
    }

    public function getUrlAttribute()
    {
        return route('roadtrips.show', $this->code);
    }
}

<?php

namespace Experience\Models;

use Carbon\Carbon;
use Category\Models\Category;
use Category\Support\Traits\BelongsToCategory;
use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use User\Support\Traits\BelongsToUser;

class Amenity extends Category
{
    use SoftDeletes;

    public static $categorable = 'amenity';

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        $categorable = self::$categorable;

        static::addGlobalScope('amenity', function (Builder $builder) use ($categorable) {
            $builder->where('categorable_type', $categorable);
        });
    }
}

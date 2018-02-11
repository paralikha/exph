<?php

namespace Review\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Pluma\Models\Model;
use User\Support\Traits\BelongsToUser;

class Review extends Model
{
    use SoftDeletes, BelongsToUser;

    protected $with = ['user', 'reviewable'];

    protected $appends = ['excerpt', 'useravatar'];

    // protected $fillable = ['user_id'];
    protected $ratings = ['5', '4.5', '4', '3.5', '3', '2.5', '2', '1.5', '1'];

    protected $searchables = ['body', 'delta', 'created_at', 'updated_at'];

    public function reviewable()
    {
        return $this->morphTo();
    }

    public static function compute($id, $type)
    {
        $instance = (new static);
        $count = $instance->where('reviewable_id', $id)
                ->where('reviewable_type', $type)
                ->get()->count();

        $sum = [];
        foreach ($instance->ratings as $rating) {
            $rate = $instance->where('reviewable_id', $id)
                ->where('reviewable_type', $type)
                ->where('rating', $rating)
                ->get();
            $sum[$rating] = $rating * ($rate->count());
        }

        return (array_sum($sum)) / $count;
    }

    public function getUseravatarAttribute()
    {
        return $this->user->displayavatar;
    }
}

<?php

namespace Experience\Models;

use Pluma\Models\Model;

class Rating extends Model
{
    protected $table = 'experience_rating';

    protected $fillable = ['rate', 'user_id'];

    protected $ratings = ['5', '4.5', '4', '3.5', '3', '2.5', '2', '1.5', '1'];

    public function ratable()
    {
        return $this->morphTo();
    }

    public static function compute($id, $type)
    {
        $instance = (new static);
        $count = $instance->where('ratable_id', $id)
                ->where('ratable_type', $type)
                ->get()->count();

        $sum = [];
        foreach ($instance->ratings as $rating) {
            $rate = $instance->where('ratable_id', $id)
                ->where('ratable_type', $type)
                ->where('rate', $rating)
                ->get();
            $sum[$rating] = $rating * ($rate->count());
        }

        return (array_sum($sum)) / $count;
    }
}

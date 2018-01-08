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

    public function getDateAttribute()
    {
        if (date('m-d-Y', strtotime($this->date_start)) == date('m-d-Y', strtotime($this->date_end))) {
            return date('M d Y', strtotime($this->date_start));
        }

        $m = date('m-Y', strtotime($this->date_start)) == date('m-Y', strtotime($this->date_end))
            ? date('M d', strtotime($this->date_start)) . " - " . date('d, Y', strtotime($this->date_end))
            : date('M d, Y', strtotime($this->date_start)) . " - " . date('M d, Y', strtotime($this->date_end));

        return $m;
    }

    public function getDaysAttribute()
    {
        if (date('m-d-Y', strtotime($this->date_start)) == date('m-d-Y', strtotime($this->date_end))) {
            return date('D', strtotime($this->date_start));
        }

        $m = date('m-Y', strtotime($this->date_start)) == date('m-Y', strtotime($this->date_end))
            ? date('D', strtotime($this->date_start)) . " - " . date('D', strtotime($this->date_end))
            : date('D', strtotime($this->date_start)) . " - " . date('D', strtotime($this->date_end));

        return $m;
    }

    public function getTimeAttribute()
    {
        if (date('m-d-Y', strtotime($this->date_start)) == date('m-d-Y', strtotime($this->date_end))) {
            return date('h:ma', strtotime($this->date_start));
        }

        $m = date('m-Y', strtotime($this->date_start)) == date('m-Y', strtotime($this->date_end))
            ? date('h:ma', strtotime($this->date_start)) . " - " . date('h:ma', strtotime($this->date_end))
            : date('h:ma', strtotime($this->date_start)) . " - " . date('h:ma', strtotime($this->date_end));

        return $m;
    }
}

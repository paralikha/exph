<?php

namespace Experience\Models;

use Carbon\Carbon;
use Category\Support\Traits\BelongsToCategory;
use DateTime;
use Experience\Models\Availability;
use Experience\Support\Traits\BelongsToManyAmenities;
use Experience\Support\Traits\MorphToManyRating;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Pluma\Models\Model;
use User\Support\Traits\BelongsToUser;

class Experience extends Model
{
    use SoftDeletes, BelongsToCategory, BelongsToUser, BelongsToManyAmenities, MorphToManyRating;

    protected $with = [];

    protected $fillable = ['id', 'name'];

    protected $appends = ['amount', 'date', 'categoryname', 'url', 'manager', 'created', 'removed', 'modified'];

    protected $searchables = ['name', 'price', 'created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('type', function (Builder $builder) {
            $builder->where('type', 'experience');
        });
    }

    public function availabilities()
    {
        return $this->morphMany(Availability::class, 'available');
    }

    public function getUrlAttribute()
    {
        return route('experiences.show', $this->code);
    }

    public function getAmountAttribute()
    {
        // setlocale(LC_MONETARY, settings('locale', 'en_US'));
        return settings('site_currency.symbol', '₱') . " " . number_format($this->price, 2);
    }

    public function getDateAttribute()
    {
        if (date('m-d-Y', strtotime($this->date_start)) == date('m-d-Y', strtotime($this->date_end))) {
            return date('m-d-Y', strtotime($this->date_start));
        }

        $m = date('m-Y', strtotime($this->date_start)) == date('m-Y', strtotime($this->date_end))
            ? date('M d', strtotime($this->date_start)) . " - " . date('d, Y', strtotime($this->date_end))
            : date('M d, Y', strtotime($this->date_start)) . " - " . date('M d, Y', strtotime($this->date_end));

        return $m;
    }

    public function getTimeAttribute()
    {
        return date('h:ia', strtotime($this->date_start));
    }

    public function getDayAttribute()
    {
        return date('l', strtotime($this->date_start));
    }

    public function getDaysAttribute()
    {
        $start = Carbon::parse($this->date_start);
        $end = Carbon::parse($this->date_end);
        $total = $end->diffInDays($start);
        return "$total " . ($total == 1 ? "day" : "days");
    }

    public function getCategorynameAttribute()
    {
        return $this->category ? $this->category->name : false;
    }

    public function getManagerpicAttribute()
    {
        return isset($this->user) ? $this->user->thumbnail : '';
    }

    public function getStartDateAttribute()
    {
        return date('M d, Y', strtotime($this->date_start));
    }

    public function getCurrencyAttribute()
    {
        return settings('site_currency.code', 'PHP');
    }

    public function getRefnumAttribute()
    {
        return isset($this->reference_number) ? $this->reference_number : date('Ymd', strtotime($this->created_at)).user()->id.'00'.date('His');
    }

    public function getManagerAttribute()
    {
        return $this->user;
    }

    //
    public function experience()
    {
        return $this->morphMany('Review', 'reviewable');
    }

    public function reviews()
    {
        return $this->morphMany(\Review\Models\Review::class, 'reviewable');
    }
}

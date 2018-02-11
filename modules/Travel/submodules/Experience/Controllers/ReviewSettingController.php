<?php

namespace Experience\Controllers;

use Illuminate\Http\Request;
use Review\Models\Review;
use Setting\Controllers\SettingController as BaseSettingController;

class ReviewSettingController extends BaseSettingController
{
    public function index(Request $request)
    {
        $reviews = Review::all();

        return view("Experience::settings.review")->with(compact('reviews'));
    }
}

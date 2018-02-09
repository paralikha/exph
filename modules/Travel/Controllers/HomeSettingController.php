<?php

namespace Travel\Controllers;

use Setting\Controllers\SettingController as BaseSettingController;
use Setting\Models\Setting;
use Setting\Requests\SettingRequest;

class HomeSettingController extends BaseSettingController
{
    public function getHomeForm(SettingRequest $request)
    {
        if ($request->has('video_bg')) {
            $file = $request->file('video_bg');
            $filePath = public_path();
            $originalName = "logo.png";
            $file->move($filePath, $originalName);
            $logoName = "$originalName?ts=" . date('Ymdhis');
            Setting::updateOrCreate(['key' => 'video_bg'], ['value' => $logoName]);
        }

        foreach ($request->except(['_token', 'video_bg']) as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => is_array($value) ? serialize($value) : $value]);
        }

        return view("Travel::settings.home");
    }
}

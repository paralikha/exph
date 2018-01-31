<?php

namespace Travel\Controllers;

use Setting\Controllers\SettingController as BaseSettingController;

class HomeSettingController extends BaseSettingController
{
    public function getHomeForm()
    {
        return view("Travel::settings.home");
    }
}

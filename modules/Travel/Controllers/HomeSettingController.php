<?php

namespace Travel\Controllers;

use Catalogue\Models\Catalogue;
use Setting\Controllers\SettingController as BaseSettingController;

class HomeSettingController extends BaseSettingController
{
    public function getHomeForm()
    {
        $catalogues = Catalogue::mediabox();

        return view("Travel::settings.home")->with(compact('catalogues'));
    }
}

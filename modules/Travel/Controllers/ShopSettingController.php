<?php

namespace Travel\Controllers;

use Setting\Controllers\SettingController as BaseSettingController;

class ShopSettingController extends BaseSettingController
{
    public function getShopForm()
    {
        return view("Travel::settings.shop");
    }
}

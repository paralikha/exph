<?php

namespace Travel\Controllers;

use Frontier\Controllers\AdminController;
use Illuminate\Http\Request;
use User\Models\User;

class AccountController extends AdminController
{
    public function getAccountForm(Request $request, $handlename)
    {
        $resource = User::whereUsername($handlename)->firstOrFail();

        return view("Theme::profiles.account")->with(compact('resource'));
    }
}

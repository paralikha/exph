<?php

namespace Travel\Controllers;

use Frontier\Controllers\PublicController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Travel\Mails\ContactUsMailer;

class ContactController extends PublicController
{
    public function submit(Request $request)
    {
        Mail::to(settings('site_email', config('mail.from.address')))->send(new ContactUsMailer($request->all()));

        return back();
    }
}

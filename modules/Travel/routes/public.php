<?php

Route::post('contact-us/submit', '\Travel\Controllers\ContactController@submit')->name('contactus.submit');

// Route::get('asd', function () {
//     $data = [
//         "_token" => "86Mgu5NJTercuxzfe2YURmUIcx1JrpIJxarbp3jw",
//         "fullname" => "asdasd",
//         "email" => "asds@asd.com",
//         "mobile_number" => "asdad",
//         "message" => "asdasdasd",
//     ];

//     return new \Travel\Mails\ContactUsMailer($data);
// });

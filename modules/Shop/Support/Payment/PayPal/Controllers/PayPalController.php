<?php

namespace Shop\Support\Payment\PayPal\Controllers;

use Shop\Controllers\ShopController;
use Shop\Support\Payment\PayPal\Traits\PayPalCredentials;
use Shop\Support\Payment\PayPal\Traits\PayPalPayment;

class PayPalController extends ShopController
{
    use PayPalCredentials, PayPalPayment;
}

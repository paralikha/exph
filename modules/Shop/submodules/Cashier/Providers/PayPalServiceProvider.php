<?php

namespace Cashier\Providers;

use Cashier\Support\PayPal\Credential;
use Pluma\Support\Providers\ServiceProvider;

class PayPalServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

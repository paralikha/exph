<?php

namespace Cashier\Providers;

use Pluma\Support\Providers\ServiceProvider;

class CashierServiceProvider extends ServiceProvider
{
    /**
     * Array of observable models.
     *
     * @var array
     */
    protected $observables = [
        [\Cashier\Models\Cashier::class, '\Cashier\Observers\CashierObserver'],
    ];

    /**
     * Registered middlewares on the
     * Service Providers Level.
     *
     * @var mixed
     */
    protected $middlewares = [
        //
    ];

    /**
     * Array of Service Providers.
     *
     * @var array
     */
    protected $services = [
        '\Cashier\Providers\PayPalServiceProvider',
    ];

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
        parent::boot();
    }
}

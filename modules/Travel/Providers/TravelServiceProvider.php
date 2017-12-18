<?php

namespace Travel\Providers;

use Pluma\Support\Providers\ServiceProvider;

class TravelServiceProvider extends ServiceProvider
{
    /**
     * Array of providers to register.
     *
     * @var array
     */
    protected $providers = [
        \Travel\Providers\PayPalServiceProvider::class,
    ];

    /**
     * Array of observable models.
     *
     * @var array
     */
    protected $observables = [
        //
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
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootObservables();

        $this->registerProviders();
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

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
        // \Travel\Models\Travel::class => \Travel\Observers\TravelObserver::class,
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

        parent::boot();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        parent::register();
    }
}

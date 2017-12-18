<?php

namespace Cart\Providers;

use Pluma\Support\Providers\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Array of observable models.
     *
     * @var array
     */
    protected $observables = [
        [\Cart\Models\Cart::class, '\Cart\Observers\CartObserver'],
    ];

    /**
     * Array of providers to register.
     *
     * @var array
     */
    protected $providers = [
        \Anam\Phpcart\CartServiceProvider::class,
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
        $this->registerProviders();
    }

    /**
     * Boots the view composers.
     *
     * @return void
     */
    public function bootViewComposers()
    {
        $composers = require get_module('Cart') . "/config/composers.php";

        foreach ($composers as $composer) {
            view()->composer($composer['appears'], $composer['class']);
        }
    }
}

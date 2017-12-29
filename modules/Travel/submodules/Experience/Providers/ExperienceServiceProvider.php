<?php

namespace Experience\Providers;

use Pluma\Support\Providers\ServiceProvider;

class ExperienceServiceProvider extends ServiceProvider
{
    /**
     * Array of observable models.
     *
     * @var array
     */
    protected $observables = [
        [\Experience\Models\Experience::class, '\Experience\Observers\ExperienceObserver'],
        [\Experience\Models\Amenity::class, '\Experience\Observers\AmenityObserver'],
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
     * Array of view composers to register.
     *
     * @var array
     */
    protected $composers = [
        ['appears' => ['*'], 'class' => \Experience\Composers\ExperiencesViewComposer::class],
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootObservables();

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

    // /**
    //  * Boots the view composers.
    //  *
    //  * @return void
    //  */
    // public function bootViewComposers()
    // {
    //     $composers = require get_module('Experience') . "/config/composers.php";

    //     foreach ($composers as $composer) {
    //         view()->composer($composer['appears'], $composer['class']);
    //     }
    // }
}

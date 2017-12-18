<?php

namespace Pluma\Providers;

use Illuminate\Support\Facades\Route;
use Pluma\Support\Installation\Traits\AppIsInstalled;
use Pluma\Support\Providers\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    use AppIsInstalled;

    /**
     * Array of modules.
     *
     * @var array
     */
    protected $modules = [];

    /**
     * The hint path of all static pages.
     *
     * @var string
     */
    protected $staticBasename = "Static";

    /**
     * Create a new service provider instance.
     *
     * @return void
     */
    public function __construct($app)
    {
        parent::__construct($app);

        $this->prepareModules();
    }

    /**
     * Prepares the modules.
     *
     */
    public function prepareModules()
    {
        $this->modules = get_modules_path();
    }

    /**
     * Prepares the providers.
     *
     * @return
     */
    public function prepareProviders()
    {
        foreach ($this->modules as $module) {
            $basename = basename($module);
            if (file_exists("$module/Providers/{$basename}ServiceProvider.php")) {
                $serviceProvider = "\\$basename\\Providers\\{$basename}ServiceProvider::class";
                $this->providers[] = $serviceProvider;
            }
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerFuzzyRoutes();

        $this->registerModules();

        $this->registerStaticViews();
    }

    /**
     * Define the "fuzzy" routes for the application.
     *
     * These routes are typically for assets fetching.
     *
     * @return void
     */
    protected function registerFuzzyRoutes()
    {
        Route::middleware('web')
            ->group(core_path('routes/fuzzy.php'));
    }

    /**
     * Load views from static folder.
     *
     * @return void
     */
    protected function registerStaticViews()
    {
        if (is_dir(config("view.static", 'resources/views/static'))) {
            $this->staticBasename = config("view.static_basename", $this->staticBasename);

            $this->loadViewsFrom(config("view.static", 'resources/views/static'), $this->staticBasename);
        }
    }

    /**
     * Register the modules.
     *
     * @return void
     */
    public function registerModules()
    {
        $this->loadModules($this->modules);
        $this->loadPublicRoutes($this->modules);
    }

    /**
     * Load service providers from the specified modules.
     *
     * @return void
     */
    public function loadModules($modules = null)
    {
        $modules = array_reverse($modules, $preserveKeys = true);
        foreach ($modules as $key => $module) {
            if (is_array($module)) {
                // Load Modules again
                $this->loadModules($module);

                // Swap parent module
                $module = $key;
            }

            // Load Services
            $this->loadServiceProviders($module);

            // Load Views
            $this->loadViews($module);

            // Load Routes
            if ($this->appIsInstalled()) {
                $this->loadRoutes($module);
            }
        }
    }

    public function loadServiceProviders($module = null)
    {
        $basename = basename($module);
        if (file_exists("$module/Providers/{$basename}ServiceProvider.php")) {
            $serviceProvider = "$basename\\Providers\\{$basename}ServiceProvider";
            $this->app->register($serviceProvider);
        }
    }

    /**
     * Load views from specified modules.
     *
     * @var array $modules
     * @return void
     */
    public function loadViews($module = null)
    {
        $basename = basename($module);

        if (config('view.single-page-app', false) && is_dir("$module/presentations")) {
            $this->loadViewsFrom("$module/presentations", $basename);
        }

        if (is_dir("$module/views")) {
            $this->loadViewsFrom("$module/views", $basename);
        }
    }

    /**
     * Load routes.
     *
     * @param  array $module
     * @return void
     */
    public function loadRoutes($module = null)
    {
        $basename = basename($module);

        if (file_exists("$module/API/routes/api.php")) {
            Route::group([
                'middleware' => ['api'],
                'as' => 'api.',
                'prefix' => config('routes.api.slug', 'api')
            ], function () use ($module) {
                include_file("$module/API/routes", "api.php");
            });
        }

        if (file_exists("$module/routes/admin.php")) {
            Route::group([
                'middleware' => ['web'],
                'prefix' => config('routes.admin.slug', 'admin'),
                'suffix' => '{locale?}',
            ], function () use ($module) {
                include_file("$module/routes", "admin.php");
            });
        }

        if (file_exists("$module/routes/web.php")) {
            Route::group([
                'middleware' => ['web'],
                'prefix' => config('routes.web.slug', '')
            ], function () use ($module) {
                include_file("$module/routes", "web.php");
            });
        }
    }

    /**
     * Load public routes.
     *
     * @param  array $modules
     * @return void
     */
    public function loadPublicRoutes($modules)
    {
        foreach ($modules as $module) {
            if ($this->appIsInstalled() && file_exists("$module/routes/public.php")) {
                Route::group([
                    'middleware' => ['web'],
                ], function () use ($module) {
                    include_file("$module/routes", "public.php");
                });
            }
        }
    }
}

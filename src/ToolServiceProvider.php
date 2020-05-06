<?php

namespace Runline\ProfileTool;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Runline\ProfileTool\Http\Middleware\Authorize;

class ToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'nova-profile-tool');

        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'nova-profile-tool');

        $this->publishes([
         __DIR__ . '/../config/nova-profile-tool.php' => config_path('nova-profile-tool.php'),
        ], 'config');

        $this->publishes([
          __DIR__.'/../resources/lang' => resource_path('lang/vendor/nova-profile-tool'),
        ]);

        $this->app->booted(function () {
            $this->routes();
        });

        Nova::serving(function (ServingNova $event) {
            //
        });
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova', Authorize::class])
                ->prefix('nova-vendor/nova-profile-tool')
                ->group(__DIR__.'/../routes/api.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
           __DIR__ . '/../config/nova-profile-tool.php',
           'nova-profile-tool'
       );
    }
}

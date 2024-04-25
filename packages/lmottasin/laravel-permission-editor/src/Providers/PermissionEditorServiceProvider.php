<?php

namespace Lmottasin\LaravelPermissionEditor\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Lmottasin\LaravelPermissionEditor\Http\Middleware\SpatiePermissionMiddleware;

class PermissionEditorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        Route::prefix('permission-editor')
            ->as('permission-editor.')
            // configurable permission middleware
            ->middleware(config('permission-editor.middleware', ['web', 'spatie-permission']))
            ->group(function () {
                $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
            });

        // views load
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'permission-editor');

        // publish resource files
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../../resources/assets' => public_path('permission-editor'),
            ], 'assets');

            // config file
            $this->publishes([
                __DIR__ . '/../../config/permission-editor.php' => config_path('permission-editor.php'),
            ], 'permission-editor-config');
        };

        // alias middleware
        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('spatie-permission', SpatiePermissionMiddleware::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

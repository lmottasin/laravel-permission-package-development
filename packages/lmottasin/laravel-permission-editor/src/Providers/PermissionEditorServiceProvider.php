<?php

namespace Lmottasin\LaravelPermissionEditor\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class PermissionEditorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        Route::prefix('permission-editor')
            ->as('permission-editor.')
            ->middleware('web')
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
        };
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

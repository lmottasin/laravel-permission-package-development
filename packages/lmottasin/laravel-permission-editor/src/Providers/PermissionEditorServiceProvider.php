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
            ->group(function (){
                $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
            });

        // views load
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'permission-editor');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

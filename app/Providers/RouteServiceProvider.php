<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {

        Route::prefix('api') // Optionally, you can change the prefix to something else.
            ->group(function () {
                // Add your route definition here
                Route::match(['get', 'post'], '/manage/{model}', [\App\Http\Controllers\API\ManageController::class, 'handleRequest']);
            });
    }
}

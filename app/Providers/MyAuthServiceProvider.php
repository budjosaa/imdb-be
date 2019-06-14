<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Auth\MyAuthService;

class MyAuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $authService = new \App\Services\Auth\MyAuthService;

        $this->app
             ->when(\App\Http\Controllers\Auth\AuthController::class)
             ->needs(\App\Services\Auth\MyAuthServiceInterface::class)
             ->give(function () use ($authService){
                 return $authService;
             });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

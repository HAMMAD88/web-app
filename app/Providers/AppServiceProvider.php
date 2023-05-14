<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
   

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
    public function register()
   {
    $this->app->bind('App\Services\MailService', function ($app) {
        return new \App\Services\MailService();
    });
    }

}

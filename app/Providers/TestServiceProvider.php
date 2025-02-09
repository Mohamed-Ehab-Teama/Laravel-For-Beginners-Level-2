<?php

namespace App\Providers;

use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class TestServiceProvider extends ServiceProvider
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
    public function boot(): void
    {
        // dump("Stage own Provider");

        // Share Data Over All Views
        Facades\View::share('my_name', "Mohamed Ehab Teama");

        // Share Data Over Specific View
        Facades\View::composer('welcome', function (View $view) {
            return $view->with('specific', "Just Welcome View ");
        });
        
        Facades\View::composer('dashboard', function (View $view) {
            return $view->with('specificDash', "Just Dashboard View ");
        });

    }
}

<?php

namespace App\Providers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

// dump("Starge 08");


class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
        
        // Rate Limit
        RateLimiter::for('watch_your_limit', function (Request $request) {
            return Limit::perMinute(5);
        });


        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

                Route::middleware(['web', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])
                ->prefix( LaravelLocalization::setLocale() )
                ->group(base_path('routes/web.php'));

            // Admins Routes
            // Route::middleware('web')
            //     ->prefix('admins')
            //     ->group(base_path('routes/admin.php'));
            
            // Merchants Routes
                // Route::middleware('web')
                // ->prefix('merchants')
                // ->group(base_path('routes/merchant.php'));
        });

        // Route::pattern('id', '[0-9]+');
        // Route::pattern('name', '[a-zA-Z]+');

        // Manel Slugs
        // Route::bind('product', function (string $value) {
        //     return Product::where('name', str_replace('-', ' ', $value) )->firstOrFail();
        // });

    }
}

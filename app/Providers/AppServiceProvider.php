<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        // Fix asset URLs for different environments
        if (App::environment('local')) {
            // For local development, remove public/ prefix from asset URLs
            URL::forceRootUrl(config('app.url'));
        } else {
            // For production (Hostinger), add public/ prefix if not already set
            if (!config('app.asset_url')) {
                config(['app.asset_url' => config('app.url') . '/public']);
            }
        }
    }
}

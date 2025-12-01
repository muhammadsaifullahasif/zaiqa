<?php

namespace App\Providers;

use App\Services\SettingsService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Register the SettingsService as a singleton
        $this->app->singleton('settings', function ($app) {
            return new SettingsService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Share settings with all views
        try {
            $settings = app('settings');
            View::share('settings', $settings);
        } catch (\Exception $e) {
            // Handle case where database is not yet migrated
            // or settings table doesn't exist
        }
    }
}

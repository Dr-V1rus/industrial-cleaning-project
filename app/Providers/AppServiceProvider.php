<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Force HTTPS in production
        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }

        // Share settings with all views
        View::composer('*', function ($view) {
            try {
                $settings = Setting::all()->pluck('value', 'key')->toArray();
                $view->with('settings', $settings);
            } catch (\Exception $e) {
                $view->with('settings', []);
            }
        });
    }
}
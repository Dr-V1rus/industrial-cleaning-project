<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
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

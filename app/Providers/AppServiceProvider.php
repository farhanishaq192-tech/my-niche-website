<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Force HTTPS in production so Filament/asset() URLs match the
        // actual scheme behind Railway's proxy (otherwise browsers block
        // mixed content and the admin panel loads without CSS/JS).
        if (env('APP_ENV') === 'production' || str_starts_with((string) env('APP_URL'), 'https://')) {
            URL::forceScheme('https');
            $this->app['request']->server->set('HTTPS', 'on');
        }
    }
}

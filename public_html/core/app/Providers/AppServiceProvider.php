<?php

namespace App\Providers;



use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
            Config::set([
                'services.google.client_id' => set('google_client_id'),
                'services.google.client_secret' => set('google_secret_key'),
            ]);
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Config;
use App\Models\ApiSetting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Gate::before(function ($user, $ability) {
            return $user->hasRole('Super Admin') ? true : null;
        });

        $apiSetting = ApiSetting::first();

        if ($apiSetting) {
            Config::set('steadfast-courier.api_key', $apiSetting->steadfast_client_id);
            Config::set('steadfast-courier.secret_key', $apiSetting->steadfast_client_secret);
        }



    }
}

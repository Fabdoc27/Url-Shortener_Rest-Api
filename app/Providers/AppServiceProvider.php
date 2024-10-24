<?php

namespace App\Providers;

use App\Models\Url;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('url-owner', function (User $user, Url $url) {
            return $user->id === $url->user_id;
        });
    }
}

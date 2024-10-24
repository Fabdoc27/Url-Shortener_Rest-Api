<?php

namespace App\Providers;

use App\Models\Url;
use App\Models\User;
use Dedoc\Scramble\Scramble;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Scramble::ignoreDefaultRoutes();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('url-owner', function (User $user, Url $url) {
            return $user->id === $url->user_id;
        });

        Scramble::registerApi('v1', [
            'info' => ['version' => '1.0'],
            'ui' => ['title' => 'Url Shortener Docs v1'],
        ])
            ->routes(function (Route $route) {
                return Str::startsWith($route->uri, 'api/v1');
            });

        Scramble::registerApi('v2', [
            'info' => ['version' => '2.0'],
            'ui' => ['title' => 'Url Shortener Docs v2'],
        ])
            ->routes(function (Route $route) {
                return Str::startsWith($route->uri, 'api/v2');
            });
    }
}

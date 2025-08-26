<?php

namespace App\Providers;

use App\Models\Gold;
use App\Policies\API\GoldPolicy;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;

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
        Paginator::useBootstrapFive();
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
        Gate::policy(Gold::class, GoldPolicy::class);
    }
}

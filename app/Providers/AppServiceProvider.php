<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
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
    // Tuỳ chọn giao diện pagination theo layout
    Paginator::defaultView('vendor.pagination.custom');
    Paginator::defaultSimpleView('vendor.pagination.custom');
}
}
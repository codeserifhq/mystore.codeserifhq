<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Department;
use App\Models\JobPosition;

use App\Observers\SystemCodeObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Department::observe(SystemCodeObserver::class);
        JobPosition::observe(SystemCodeObserver::class);
    }
}

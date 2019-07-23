<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MutatorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Contracts\Mutators\UserMutatorInterface', 'App\Mutators\UserMutator');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

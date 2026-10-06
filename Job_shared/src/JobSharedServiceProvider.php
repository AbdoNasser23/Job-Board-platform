<?php

namespace App;

use Illuminate\Support\ServiceProvider;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\UserSeeder;

class JobSharedServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->app->make(DatabaseSeeder::class)->run();
        $this->app->make(UserSeeder::class)->run();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
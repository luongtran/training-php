<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
          \Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->singleton(
      \App\Repositories\User\UserRepositoryInterface::class,
      \App\Repositories\User\UserEloquentRepository::class
      );
    }
}

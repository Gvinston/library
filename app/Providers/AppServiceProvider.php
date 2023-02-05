<?php

namespace App\Providers;

use App\Services\Customer\Formatter\CustomerFormatter;
use App\Services\Customer\Formatter\CustomerFormatterInterface;
use App\Services\Customer\Repositories\CustomerRepository;
use App\Services\Customer\Repositories\CustomerRepositoryInterface;
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
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(CustomerFormatterInterface::class, CustomerFormatter::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

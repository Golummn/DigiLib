<?php

namespace App\Providers;

use App\Services\Eloquent\RakServiceImpl;
use App\Services\RakService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class RakServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public array $singletons = [
        RakService::class => RakServiceImpl::class,
    ];

    public function provides(): array
    {
        return [RakService::class];
    }


    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
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

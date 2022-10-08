<?php

namespace App\Providers;

use App\Services\BukuService;
use App\Services\Eloquent\BukuServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class BukuServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public array $singletons = [
        BukuService::class => BukuServiceImpl::class,
    ];

    public function provides(): array
    {
        return [BukuService::class];
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

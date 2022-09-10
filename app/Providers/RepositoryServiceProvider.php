<?php

namespace App\Providers;

use App\Interfaces\ClientRepoInterfaces;
use App\Interfaces\HakimRepoInterfaces;
use App\Interfaces\JadwalSidangInterfaces;
use App\Repositories\ClientRepository;
use App\Repositories\HakimRepository;
use App\Repositories\JadwalSidangRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
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
        $this->app->bind(HakimRepoInterfaces::class, HakimRepository::class);
        $this->app->bind(ClientRepoInterfaces::class, ClientRepository::class);
        $this->app->bind(JadwalSidangInterfaces::class, JadwalSidangRepository::class);
    }
}

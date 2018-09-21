<?php

namespace App\Providers;

use App\Repositories\Contracts\{ClientRepository, MessageRepository, StationRepository, UserRepository};

use App\Repositories\Eloquent\{EloquentClientRepository,
    EloquentMessageRepository,
    EloquentStationRepository,
    EloquentUserRepository};

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
        $this->app->bind(StationRepository::class, EloquentStationRepository::class);
        $this->app->bind(ClientRepository::class, EloquentClientRepository::class);
        $this->app->bind(MessageRepository::class, EloquentMessageRepository::class);
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
}

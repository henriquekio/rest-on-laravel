<?php

namespace App\Providers;

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
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\TarefaRepository::class, \App\Repositories\TarefaRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CategoriaRepository::class, \App\Repositories\CategoriaRepositoryEloquent::class);
        //:end-bindings:
    }
}

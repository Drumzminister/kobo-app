<?php

namespace App\Services\Client\Providers;

use App\Data\Repositories\Transaction;
use App\Data\Repositories\TransactionRepository;
use App\Data\Transaction as TransactionModel;
use Illuminate\Container\Container;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap migrations and factories for:
     * - `php artisan migrate` command.
     * - factory() helper.
     *
     * Previous usage:
     * php artisan migrate --path=src/Services/Client/database/migrations
     * Now:
     * php artisan migrate
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(TransactionRepository::class, function(Container $app) {
           return new Transaction($app->make(TransactionModel::class));
        });
    }

    /**
     * Register the Client service provider.
     *
     * @return void
     */
    public function register()
    {
    }
}

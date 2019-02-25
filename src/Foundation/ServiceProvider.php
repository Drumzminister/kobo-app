<?php
namespace App\Foundation;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        // Register the service providers of your Services here.
        // $this->app->register('full namespace here')
	    $this->app->register('App\Services\Client\Providers\ClientServiceProvider');
	    $this->app->register('App\Services\Client\Providers\RepositoryServiceProvider');
	    $this->app->register('App\Services\Website\Providers\WebsiteServiceProvider');
	    $this->app->register('App\Services\Accountant\Providers\AccountantServiceProvider');
    }
}

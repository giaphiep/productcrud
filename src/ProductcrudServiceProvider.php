<?php

namespace GiapHiep\Productcrud;

use Illuminate\Support\ServiceProvider;

use GiapHiep\Productcrud\Commands\ProductcrudInstall;


class ProductcrudServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $package_name = "giaphiep";

    	//migrations
    	$this->loadMigrationsFrom(__DIR__.'/database/migrations/');
    	
    	$this->publishes([
	        __DIR__.'/database/migrations/' => database_path('migrations')
	    ], 'productcrud_migrations');

    	//view
    	
    	$this->loadViewsFrom(__DIR__.'/resources/views', $package_name);

	    $this->publishes([
	        __DIR__.'/resources/views' => resource_path('views/vendor/'. $package_name),
	    ], 'productcrud_views');


        $this->app->register(RouteServiceProvider::class);


        //commands
        if ($this->app->runningInConsole()) {
	        $this->commands([
	            ProductcrudInstall::class,
	        ]);
    	}


    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
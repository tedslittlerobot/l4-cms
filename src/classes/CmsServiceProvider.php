<?php namespace Tlr\Cms;

use Illuminate\Support\ServiceProvider;

class CmsServiceProvider extends ServiceProvider {

	/**
	 * Kick off the router using events
	 */
	public function boot()
	{
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->register('Tlr\Routing\EventServiceProvider');
		$this->app->register('Tlr\Auth\AuthServiceProvider');
		$this->app->register('Tlr\Types\TypeServiceProvider');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}

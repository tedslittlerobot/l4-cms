<?php namespace Tlr\Cms;

use Illuminate\Support\ServiceProvider;


	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;
class CmsServiceProvider extends ServiceProvider {

	/**
	 * Kick off the router using events
	 * @return [type] [description]
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

<?php namespace Tlr\Cms;

use Illuminate\Support\ServiceProvider;

class CmsServiceProvider extends ServiceProvider {

	/**
	 * Kick off the router using events
	 */
	public function boot()
	{
		$this->package('tlr/l4-cms');

		$this->reassignDefaultViews();
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->register('Tlr\Menu\MenuServiceProvider');
		$this->app->register('Tlr\Routing\EventServiceProvider');
		$this->app->register('Tlr\Auth\AuthServiceProvider');
		$this->app->register('Tlr\Types\TypeServiceProvider');
	}

	/**
	 * Reassign default views from other modules
	 */
	public function reassignDefaultViews()
	{
		\Tlr\Auth\LoginController::$loginView = 'l4-cms::login';
		\Tlr\Auth\PasswordResetController::$requestView = 'l4-cms::password.request';
 		\Tlr\Auth\PasswordResetController::$resetView = 'l4-cms::password.reset';
		\Tlr\Auth\UsersController::$indexView = 'l4-cms::user.index';
		\Tlr\Auth\UsersController::$editView = 'l4-cms::user.edit';
		\Tlr\Auth\UsersController::$showUserView = 'l4-cms::user.show';
		\Tlr\Auth\UsersController::$editProfileView = 'l4-cms::user.profile';
	}

	/**
	 * Override method for more shallow file structure
	 * @inheritdoc
	 */
	public function guessPackagePath()
	{
		$path = with(new \ReflectionClass($this))->getFileName();

		return realpath(dirname($path).'/../');
	}

}

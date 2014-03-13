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

		$this->routes( $this->app['router'], $this->app['events'] );

		$this->adminMenu();
	}

	/**
	 * Set up the main admin menu
	 * @todo this could probably be in a better place ;)
	 */
	public function adminMenu()
	{
		$this->app['events']->listen('routes.finish', function()
		{
			if (! $user = $this->app['auth']->user() ) return;

			$menu = $this->app['menu']->menu('admin-header-nav');
				$menu->setAttributes(array('class' => 'eight columns'));

			$usersMenu = $menu->item('users', 'Users');
				$usersMenu->item('manage-users', 'Manage users', route('admin.user.index'));

			$profileMenu = $menu->item('user', $user->name, route('admin.profile'));
				$profileMenu->item('logout', 'Log Out', route('logout'));
		});
	}

	public function routes($router, $events)
	{
		$events->listen('routes.admin', function( $router )
		{
			$router->get('/', array( 'as' => 'admin', 'uses' => 'Tlr\Cms\CmsController@dashboard' ));
		});
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->register('Tlr\Menu\Laravel\MenuServiceProvider');
		$this->app->register('Tlr\Routing\EventServiceProvider');
		$this->app->register('Tlr\Auth\AuthServiceProvider');
		$this->app->register('Tlr\Types\TypeServiceProvider');

		$this->commands('Tlr\Cms\InstallCommand');

		$this->app->register('Barryvdh\Debugbar\ServiceProvider');
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

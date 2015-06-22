<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;
use View;

class BreadCrumbsServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		View::composer('pages.includes.breadcrumbs', function($view)
        {
        	$path = Request::path();

        	if($path == '/')
        	{
        		return $view->with('bread',$bread = array());
        	}

			$path = array_slice(explode('/', $path), 0, 3, true);

			$bread = [];

        	$url = '';

			foreach ($path as $part) 
			{
				$url .= $part.'/';

				$bread[ucfirst(str_replace('-',' ', $part))] = $url;
			}
			
        	return $view->with('bread',$bread);
        });
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}

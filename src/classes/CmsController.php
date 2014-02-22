<?php namespace Tlr\Cms;

use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\View;

class CmsController extends Controller {

	public function dashboard()
	{
		return View::make('l4-cms::dashboard');
	}

}

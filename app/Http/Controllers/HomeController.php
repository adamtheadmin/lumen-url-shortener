<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class HomeController extends BaseController
{
	public function render(){
		return app()->make('view')->make('index');
	}
}

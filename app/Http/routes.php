<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use App\Redirects;
use App\GoController;
use App\HomeController;

$app->get('/', 'HomeController@render');

$app->get('/go/{hash}', 'RedirectController@go');

$app->post('/shorten', 'RedirectController@shorten');
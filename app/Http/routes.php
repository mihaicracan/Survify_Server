<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return response('Nothing Here.', 404);
});

// API routes...
$app->get('api/test', 'APIController@getTest');

// API Authenticated routes...
$app->group(['middleware' => 'auth'], function ($app) {

	$app->get('api/test/auth', 'APIController@getAuthTest');

});

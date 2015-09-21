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

/**
 * API routes.
 */
$app->post('api/register', 'APIController@postRegister');
$app->post('api/login', 'APIController@postLogin');
$app->post('api/logout', 'APIController@postLogout');

/**
 * API Authenticated routes.
 */
$app->group(['middleware' => 'jwt.auth'], function ($app) {

});

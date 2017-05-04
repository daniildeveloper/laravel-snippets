<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->group(['prefix' => 'foo'], function ($api) {
        // Endpoints registered here will have the "foo" middleware applied.
        $api->get('test', 'App\Http\Controllers\API\ApiBaseController@test');
        $api->get('err', 'App\Http\Controllers\API\ApiBaseController@err');
    });
    $api->resource("authenticate", "App\Http\Controllers\API\AuthenticateController", ["only" => ["index"]]);
    $api->post("authenticate", "App\Http\Controllers\API\AuthenticateController@authenticate");
});

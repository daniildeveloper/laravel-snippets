<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::group(["prefix" => "shop"], function () {
    Route::get("/", [
    'uses' => "ShoppingCartController@showShopIndex",
    "as" => "shop.index"
    ]);
    Route::get("seed", [
    "uses" => "ShoppingCartController@seed"
    ]);
    Route::get("add-to-cart/{id}", [
    'uses' => "ShoppingCartController@addToCart",
    "as" => "shop.to-cart"
    ]);
    
    //cart
    Route::group(['prefix' => 'cart'], function () {
        Route::get("/", [
        "uses" => "ShoppingCartController@showCart",
        "as" => "shop.cart"
        ]);
        Route::get("/increment/{id}", [
        'uses' => "ShoppingCartController@incrementItemInCart"
        ]);
        Route::get("/decrement/{id}", [
        'uses' => "ShoppingCartController@decrementItemInCart"
        ]);
        Route::get("/checkoutView", [
        "uses" => "ShoppingCartController@getCheckout",
        "as" => "checkoutview"
        ]);
        Route::post("/checkout", [
        "uses" => "ShoppingCartController@checkout",
        "as" => "checkout"
        ]);
    });
    
    
});

Route::get('/ref/{id}', 'ReferalProgram@refererToSession');

Route::group(['prefix' => 'hayp'], function () {
    Route::get('/', 'HaypController@showIndex')->name('hayp');
    Route::get('/my', 'HaypController@showMyHayp')->name('my-hayp');
    Route::get('/buy-{id}', 'HaypController@buyItem');
});

Auth::routes();

Route::group([
"prefix" => "json",

], function () {
    Route::get("shop", "JsonReturnController@getShop");
});


Auth::routes();

Route::get('/home', 'HomeController@index');
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use CloudCreativity\LaravelJsonApi\Facades\JsonApi;

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

Route::namespace('Api')->group(function () {
    Route::group(['middleware' => 'auth:api', 'prefix' => 'auth'], function () {

        Route::group(['namespace' => 'Auth'], function () {
            Route::post('logout', 'AuthController@logout');
            Route::post('refresh', 'AuthController@refresh');
            Route::post('me', 'AuthController@me');
        });

        Route::group(['namespace' => 'Organization'], function () {
            Route::get('organizations', 'OrganizationController@index');
        });

        Route::group(['namespace' => 'Contact'], function () {
            Route::get('organizations', 'ContactController@index');
        });

    });

    Route::group(['namespace' => 'Auth', 'prefix' => 'auth'], function () {
        Route::post('login', 'AuthController@login');
    });
});


//Route::group(['middleware' => 'auth:api'], function () {
//    JsonApi::register('v1')->withNamespace('Api')->routes(function ($api) {
//        $api->resource('organizations')->relationships(function ($relations) {
//            $relations->hasMany('contacts');
//        });;
//        $api->resource('contacts')->relationships(function ($relations) {
//            $relations->belongsTo('organization');
//        });
//    });
//});
Route::group(['middleware' => 'auth:api'], function () {
    JsonApi::register('default')->routes(function ($api) {
        $api->resource('organizations')->relationships(function ($relations) {
            $relations->hasMany('contacts');
        });
        $api->resource('contacts')->relationships(function ($relations) {
            $relations->hasOne('organization');
        });
    });
});

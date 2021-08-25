<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false,
]);

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::namespace('Organization')->group(function () {
        Route::resource('organizations', 'OrganizationController');
    });

    Route::namespace('Contact')->group(function () {
        Route::resource('contacts', 'ContactController');
        Route::get('contacts/verify/{contact}/{verificationToken}', 'ContactController@verifyEmail');
    });
});



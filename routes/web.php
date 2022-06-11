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


/*
|--------------------------------------------------------------------------
| Route Group Users
|--------------------------------------------------------------------------
*/

Route::group([
    'namespace' => 'App\Http\Controllers',
    'middleware' => [
        // registered middleware here
    ],
], function () {
    Route::group([
        'prefix' => ''
    ], function () {
        Route::get('/', [
            'as' => 'home.index',
            'uses' => 'HomeController@index',
        ]);
    });
});

/*
|--------------------------------------------------------------------------
| Route Group Admin
|--------------------------------------------------------------------------
*/
Route::group([
    'namespace' => 'App\Http\Controllers\Admin',
    'prefix' => '',
    'middleware' => [
        // registered middleware here
    ],
], function () {
    // Route pre-fix admin
    Route::group([
        'prefix' => 'admin'
    ], function () {
        Route::get('/', [
            'as' => 'admin.DashboardController.index',
            'uses' => 'DashboardController@index',
        ]);
        Route::get('/login', [
            'as' => 'admin.LoginController.index',
            'uses' => 'LoginController@index',
        ]);
    });
});




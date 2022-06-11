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



//Route Group User
Route::group([
    'namespace' => 'App\Http\Controllers',
    'prefix' => '',
    'middleware' => [

    ],
], function () {
    Route::group([
        'prefix' => ''
    ], function () {
        Route::get('/', [
            'as' => 'HomeController.index',
            'uses' => 'HomeController@index',
        ]);
    });

});




//Route Group Admin
Route::group([
    'namespace' => 'App\Http\Controllers\Admin',
    'prefix' => 'Admin',
    'middleware' => [

    ],
], function () {
    Route::group([
        'prefix' => 'admin'
    ], function () {
        Route::get('/', [
            'as' => 'admin.DashboardController.index',
            'uses' => 'DashboardController@index',
        ]);
    });

});




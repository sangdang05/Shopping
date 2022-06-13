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
        // Registered middleware here
    ],
], function () {
    // Route pre-fix admin
    Route::group([
        'prefix' => 'admin'
    ], function () {
        Route::get('/', [
            'as' => 'admin.DashboardController.index',
            'uses' => 'DashboardController@index',
            // registered permission here
        ]);
        Route::get('/login', [
            'as' => 'admin.LoginController.index',
            'uses' => 'LoginController@index',
        ]);

        /*---------------------
        | Route Admin Product |
        ----------------------*/
        Route::group([
            'prefix' => 'admin/product',
            ['middleware' => [
            // registered middleware here
            ]]
        ], function () {
            // Crud routes
            Route::get('/', [
                'as' => 'admin.ProductController.index',
                'uses' => 'ProductController@index'
            ]);

            Route::get('create', [
                'as' => 'admin.ProductController.create',
                'uses' => 'ProductController@create'
            ]);

            Route::post('store', [
                'as' => 'admin.ProductController.store',
                'uses' => 'ProductController@store'
            ]);

            Route::get('edit/{id}', [
                'as' => 'admin.ProductController.edit',
                'uses' => 'ProductController@edit'
            ]);

            Route::put('update/{id}', [
                'as' => 'admin.ProductController.update',
                'uses' => 'ProductController@update'
            ]);

            Route::delete('destroy/{id}', [
                'as' => 'admin.ProductController.destroy',
                'uses' => 'ProductController@destroy'
            ]);
        });

        /*---------------------
        | Route Admin Category |
        ----------------------*/
        Route::group([
            'prefix' => 'admin/Category',
            ['middleware' => [
            // registered middleware here
            ]]
        ], function () {
            // Crud routes
            Route::get('/', [
                'as' => 'admin.CategoryController.index',
                'uses' => 'CategoryController@index'
            ]);

            Route::get('create', [
                'as' => 'admin.CategoryController.create',
                'uses' => 'CategoryController@create'
            ]);

            Route::post('store', [
                'as' => 'admin.CategoryController.store',
                'uses' => 'CategoryController@store'
            ]);

            Route::get('edit/{id}', [
                'as' => 'admin.CategoryController.edit',
                'uses' => 'CategoryController@edit'
            ]);

            Route::put('update/{id}', [
                'as' => 'admin.CategoryController.update',
                'uses' => 'CategoryController@update'
            ]);

            Route::delete('destroy/{id}', [
                'as' => 'admin.CategoryController.destroy',
                'uses' => 'CategoryController@destroy'
            ]);
        });


    });



});




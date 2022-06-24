<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
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
        Route::get('/{id}/{slug}.html', [
            'as' => 'home.view',
            'uses' => 'HomeController@view',
        ]);

    });
});

/*
|--------------------------------------------------------------------------
| Route Login Admin
|--------------------------------------------------------------------------
*/
Route::prefix('admin/login')->group( function (){
    Route::get('/',[App\Http\Controllers\Admin\LoginController::class,'index'])->name('login');
    Route::post('/',[App\Http\Controllers\Admin\LoginController::class,'postLogin']);
});
/*
|--------------------------------------------------------------------------
| Route Cart
|--------------------------------------------------------------------------
*/
Route::post('/add-cart',[App\Http\Controllers\CartController::class,'index']);
Route::get('/carts',[App\Http\Controllers\CartController::class,'show']);
Route::post('/update-cart',[App\Http\Controllers\CartController::class,'update']);
Route::get('/carts/delete/{id}',[App\Http\Controllers\CartController::class,'remove']);
Route::post('/carts',[App\Http\Controllers\CartController::class,'addCart']);
/*
|--------------------------------------------------------------------------
| Route Group Admin
|--------------------------------------------------------------------------
*/
Route::group([
    'namespace' => 'App\Http\Controllers\Admin',
    'prefix' => '/',

], function () {
    // Route pre-fix admin
    Route::group([
        'prefix' => 'admin',
        'middleware' => [
        'auth',
    ]
    ], function () {
        Route::get('/', [
            'as' => 'admin.dashboard.index',
            'uses' => 'DashboardController@index',
            // registered permission here
        ]);
        Route::get('/logout', [
            'as' => 'admin.logout',
            'uses' => 'LoginController@logout',
        ]);

        Route::get('/role', [
            'as' => 'admin.role',
            'uses' => 'UserController@index',
        ]);

        /*---------------------
        | Route Admin Category |
        ----------------------*/
        Route::group([
            'prefix' => '/category',
            ['middleware' => ['role_or_permission: category-list|category-add|category-edit|category-delete']]
        ], function () {
            // Crud routes
            Route::get('/', [
                'as' => 'admin.category.index',
                'uses' => 'CategoryController@index',
                'permissions' => 'category-list'
            ]);

            Route::get('create', [
                'as' => 'admin.category.create',
                'uses' => 'CategoryController@create',
                'permissions' => 'category-add'
            ]);

            Route::post('store', [
                'as' => 'admin.category.store',
                'uses' => 'CategoryController@store',
                'permissions' => 'category-add'
            ]);

            Route::get('edit/{id}', [
                'as' => 'admin.category.edit',
                'uses' => 'CategoryController@edit',
                'permissions' => 'category-edit'
            ]);

            Route::put('update/{id}', [
                'as' => 'admin.category.update',
                'uses' => 'CategoryController@update',
                'permissions' => 'category-edit'
            ]);
            Route::delete('destroy/{id}', [
                'as' => 'admin.category.destroy',
                'uses' => 'CategoryController@destroy',
                'permissions' => 'category-delete'
            ]);
        });
        /*---------------------
        | Route Admin Product |
        ----------------------*/
        Route::group([
            'prefix' => '/product',
            ['middleware' => ['role_or_permission: products-list|products-add|products-edit|products-delete']]
        ], function () {
            // Crud routes
            Route::get('/', [
                'as' => 'admin.product.index',
                'uses' => 'ProductController@index',
                'permissions' => 'products-list'
            ]);
            Route::get('create', [
                'as' => 'admin.product.create',
                'uses' => 'ProductController@create',
                'permissions' => 'products-add'
            ]);
            Route::post('store', [
                'as' => 'admin.product.store',
                'uses' => 'ProductController@store',
                'permissions' => 'products-add'
            ]);
            Route::get('edit/{id}', [
                'as' => 'admin.product.edit',
                'uses' => 'ProductController@edit',
                'permissions' => 'products-edit'
            ]);
            Route::put('update/{id}', [
                'as' => 'admin.product.update',
                'uses' => 'ProductController@update',
                'permissions' => 'products-edit'
            ]);
            Route::delete('destroy/{id}', [
                'as' => 'admin.product.destroy',
                'uses' => 'ProductController@destroy',
                'permissions' => 'products-delete'
            ]);
        });
        /*----------------------
        |   Route Admin User   |
        ----------------------*/
        Route::group([
            'prefix' => '/user',
            ['middleware' => ['role_or_permission: user-list|user-add|user-edit|user-delete']]
        ], function () {
            // Crud routes
            Route::get('/', [
                'as' => 'admin.user.index',
                'uses' => 'UserController@index',
                'permissions' => 'user-list'
            ]);
            Route::get('create', [
                'as' => 'admin.user.create',
                'uses' => 'UserController@create',
                'permissions' => 'user-add'
            ]);
            Route::post('store', [
                'as' => 'admin.user.store',
                'uses' => 'UserController@store',
                'permissions' => 'user-add'
            ]);
            Route::get('edit/{id}', [
                'as' => 'admin.user.edit',
                'uses' => 'UserController@edit',
                'permissions' => 'user-edit'
            ]);
            Route::put('update/{id}', [
                'as' => 'admin.user.update',
                'uses' => 'UserController@update',
                'permissions' => 'user-edit'
            ]);
            Route::delete('destroy/{id}', [
                'as' => 'admin.user.destroy',
                'uses' => 'UserController@destroy',
                'permissions' => 'user-delete'
            ]);
            Route::get('role/{id}', [
                'as' => 'admin.user.role',
                'uses' => 'UserController@role',
            ]);
            Route::post('change-role/{id}', [
                'as' => 'admin.user.changeRole',
                'uses' => 'UserController@changeRole',
            ]);
        });
        /*---------------------
        | Route Admin Product |
        ----------------------*/
        Route::group([
            'prefix' => '/product',
            ['middleware' => ['role_or_permission: product-list|product-add|product-edit|product-delete']]
        ], function () {
            // Crud routes
            Route::get('/', [
                'as' => 'admin.product.index',
                'uses' => 'ProductController@index',
                'permissions' => 'product-list'
            ]);
            Route::get('create', [
                'as' => 'admin.product.create',
                'uses' => 'ProductController@create',
                'permissions' => 'product-add'
            ]);
            Route::post('store', [
                'as' => 'admin.product.store',
                'uses' => 'ProductController@store',
                'permissions' => 'product-add'
            ]);
            Route::get('edit/{id}', [
                'as' => 'admin.product.edit',
                'uses' => 'ProductController@edit',
                'permissions' => 'product-edit'
            ]);
            Route::put('update/{id}', [
                'as' => 'admin.product.update',
                'uses' => 'ProductController@update',
                'permissions' => 'product-edit'
            ]);
            Route::delete('destroy/{id}', [
                'as' => 'admin.product.destroy',
                'uses' => 'ProductController@destroy',
                'permissions' => 'roles-delete'
            ]);
        });
        /*---------------------
        | Route Admin Role    |
        ----------------------*/
        Route::group([
            'prefix' => '/roles',
            ['middleware' => ['role_or_permission: roles-list|roles-add|roles-edit|roles-delete']]
        ], function () {
            // Crud routes
            Route::get('/', [
                'as' => 'admin.roles.index',
                'uses' => 'RolesController@index',
                'permissions' => 'roles-list'
            ]);
            Route::get('create', [
                'as' => 'admin.roles.create',
                'uses' => 'RolesController@create',
                'permissions' => 'roles-add'
            ]);
            Route::post('store', [
                'as' => 'admin.roles.store',
                'uses' => 'RolesController@store',
                'permissions' => 'roles-add'
            ]);
            Route::get('edit/{id}', [
                'as' => 'admin.roles.edit',
                'uses' => 'RolesController@edit',
                'permissions' => 'roles-edit'
            ]);
            Route::put('update/{id}', [
                'as' => 'admin.roles.update',
                'uses' => 'RolesController@update',
                'permissions' => 'roles-edit'
            ]);
            Route::delete('destroy/{id}', [
                'as' => 'admin.roles.destroy',
                'uses' => 'RolesController@destroy',
                'permissions' => 'roles-delete'
            ]);
            Route::get('{id}/permissons', [
                'as' => 'admin.roles.permissions',
                'uses' => 'RolesController@permissions',
            ]);
            Route::post('change-permissons/{id}', [
                'as' => 'admin.roles.changePermissions',
                'uses' => 'RolesController@changePermissions',
            ]);
        });
        /*------------------------
        | Route Admin Permission |
        -------------------------*/
        Route::group([
            'prefix' => '/permissions',
            ['middleware' => ['role_or_permission: permissions-list|permissions-add|permissions-edit|permissions-delete']]
        ], function () {
            // Crud routes
            Route::get('/', [
                'as' => 'admin.permissions.index',
                'uses' => 'PermissionsController@index',
                'permissions' => 'permission-list'
            ]);
            Route::get('create', [
                'as' => 'admin.permissions.create',
                'uses' => 'PermissionsController@create',
                'permissions' => 'permission-add'
            ]);
            Route::post('store', [
                'as' => 'admin.permissions.store',
                'uses' => 'PermissionsController@store',
                'permissions' => 'permission-add'
            ]);
            Route::get('edit/{id}', [
                'as' => 'admin.permissions.edit',
                'uses' => 'PermissionsController@edit',
                'permissions' => 'permission-edit'
            ]);
            Route::put('update/{id}', [
                'as' => 'admin.permissions.update',
                'uses' => 'PermissionsController@update',
                'permissions' => 'permission-edit'
            ]);
            Route::delete('destroy/{id}', [
                'as' => 'admin.permissions.destroy',
                'uses' => 'PermissionsController@destroy',
                'permissions' => 'permission-delete'
            ]);
        });
    });
});




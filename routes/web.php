<?php

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
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('login', 'AuthController@getLogin');
    Route::post('login', 'AuthController@postLogin');
    Route::get('logout', 'AuthController@getLogout');

    Route::get('/', function() {
        return view('admin.index');
    })->middleware('login');
    Route::get('/index', function() {
        return view('admin.index');
    })->middleware('login');

    //权限相关的只有超级管理员可以访问
    Route::group(['prefix' => 'auth', 'middleware' => 'role:super_admin'], function() {
        
        //个人资料
        Route::group(['prefix' => 'profile'], function() {
            Route::get('edit','ProfileController@edit');
            Route::put('edit','ProfileController@update');
        });
        //菜单管理
        Route::group(['prefix' => 'menu'], function() {
            //菜单列表
            Route::get('/', 'MenuController@index');
            //菜单排序和更改级别
            Route::post('nestable', 'MenuController@nestable');
            //添加操作
            Route::post('/', 'MenuController@store');
            //修改菜单页面
            Route::get('/{id}/edit', 'MenuController@edit');
            //修改菜单操作
            Route::put('/{id}', 'MenuController@update');
            //菜单删除操作
            Route::delete('/{id}', 'MenuController@destroy');
        });
        //用户管理
        Route::group(['prefix' => 'user'], function() {
            //用户列表
            Route::get('/', 'UserController@index');
            //用户添加页面
            Route::get('/create', 'UserController@create');
            //用户添加操作
            Route::post('/', 'UserController@store');
            //用户修改页面
            Route::get('/{id}/edit', 'UserController@edit');
            //用户修改操作
            Route::put('/{id}', 'UserController@update');
            //用户删除操作
            Route::delete('/{id}', 'UserController@destroy');
            //用户批量删除操作
            Route::post('/batch_destroy', 'UserController@batchDestroy');
        });
        //角色管理
        Route::group(['prefix' => 'role'], function() {
            //角色列表
            Route::get('/', 'RoleController@index');
            //角色添加页面
            Route::get('/create', 'RoleController@create');
            //角色添加操作
            Route::post('/', 'RoleController@store');
            //角色修改页面
            Route::get('/{id}/edit', 'RoleController@edit');
            //角色修改操作
            Route::put('/{id}', 'RoleController@update');
            //角色删除操作
            Route::delete('/{id}', 'RoleController@destroy');
            //角色批量删除操作
            Route::post('/batch_destroy', 'RoleController@batchDestroy');
        });
        //权限管理
        Route::group(['prefix' => 'permission'], function() {
            //权限列表
            Route::get('/', 'PermissionController@index');
            //权限添加页面
            Route::get('/create', 'PermissionController@create');
            //权限添加操作
            Route::post('/', 'PermissionController@store');
            //权限修改页面
            Route::get('/{id}/edit', 'PermissionController@edit');
            //权限修改操作
            Route::put('/{id}', 'PermissionController@update');
            //权限删除操作
            Route::delete('/{id}', 'PermissionController@destroy');
            //权限批量删除操作
            Route::post('/batch_destroy', 'PermissionController@batchDestroy');
        });
    });
});

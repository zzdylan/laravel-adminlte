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
for($i=0;$i<50;$i++){
    Route::get('/admin/test'.$i,function(){
        return view('test');
    });
}
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
    //菜单管理
    Route::group(['prefix' => 'menu'], function() {
        //菜单列表
        Route::get('/', 'MenuController@index')->middleware('permission:menu.list');
        //菜单排序和更改级别
        Route::post('nestable', 'MenuController@nestable')->middleware('permission:menu.nestable');
        //添加操作
        Route::post('/', 'MenuController@store')->middleware('permission:menu.create');
        //修改菜单页面
        Route::get('/{id}/edit', 'MenuController@edit')->middleware('permission:menu.edit');
        //修改菜单操作
        Route::put('/{id}', 'MenuController@update')->middleware('permission:menu.edit');
        //菜单删除操作
        Route::delete('/{id}', 'MenuController@destroy')->middleware('permission:menu.destroy');
    });
    //用户管理
    Route::group(['prefix' => 'user'], function() {
        //用户列表
        Route::get('/', 'UserController@index')->middleware('permission:user.list');
        //用户添加页面
        Route::get('/create', 'UserController@create')->middleware('permission:user.create');
        //用户添加操作
        Route::post('/', 'UserController@store')->middleware('permission:user.create');
        //用户修改页面
        Route::get('/{id}/edit', 'UserController@edit')->middleware('permission:user.edit');
        //用户修改操作
        Route::put('/{id}', 'UserController@update')->middleware('permission:user.edit');
        //用户删除操作
        Route::delete('/{id}', 'UserController@destroy')->middleware('permission:user.destroy');
        //用户批量删除操作
        Route::post('/batch_destroy', 'UserController@batchDestroy')->middleware('permission:user.destroy');
    });
    //角色管理
    Route::group(['prefix' => 'role'], function() {
        //角色列表
        Route::get('/', 'RoleController@index')->middleware('permission:role.list');
        //角色添加页面
        Route::get('/create', 'RoleController@create')->middleware('permission:role.create');
        //角色添加操作
        Route::post('/', 'RoleController@store')->middleware('permission:role.create');
        //角色修改页面
        Route::get('/{id}/edit', 'RoleController@edit')->middleware('permission:role.edit');
        //角色修改操作
        Route::put('/{id}', 'RoleController@update')->middleware('permission:role.edit');
        //角色删除操作
        Route::delete('/{id}', 'RoleController@destroy')->middleware('permission:role.destroy');
        //角色批量删除操作
        Route::post('/batch_destroy', 'RoleController@batchDestroy')->middleware('permission:role.destroy');
    });
    //权限管理
    Route::group(['prefix' => 'permission'], function() {
        //权限列表
        Route::get('/', 'PermissionController@index')->middleware('permission:permission.list');
        //权限添加页面
        Route::get('/create', 'PermissionController@create')->middleware('permission:permission.create');
        //权限添加操作
        Route::post('/', 'PermissionController@store')->middleware('permission:permission.create');
        //权限修改页面
        Route::get('/{id}/edit', 'PermissionController@edit')->middleware('permission:permission.edit');
        //权限修改操作
        Route::put('/{id}', 'PermissionController@update')->middleware('permission:permission.edit');
        //权限删除操作
        Route::delete('/{id}', 'PermissionController@destroy')->middleware('permission:permission.destroy');
        //权限批量删除操作
        Route::post('/batch_destroy', 'PermissionController@batchDestroy')->middleware('permission:permission.destroy');
    });
});

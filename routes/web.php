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

Route::any('/admin', 'admin\IndexController@index');//后台首页


Route::any('/cateadd', 'admin\IndexController@cateadd');//后台导航添加页
Route::any('/cadd', 'admin\IndexController@cadd');//导航添加
Route::any('/catelist', 'admin\IndexController@catelist');//导航展示
Route::any('/del', 'admin\IndexController@del');//导航删除
Route::any('/update/{id}', 'admin\IndexController@update');//修改页
Route::any('/updates', 'admin\IndexController@updates');//修改页
Route::any('/dianshow', 'admin\IndexController@dianshow');//是否展示急点急改
Route::any('/updatesort', 'admin\IndexController@updatesort');//排序急点急改


/*分类*/
Route::prefix('category')->group(function(){
    Route::any('/add', 'admin\CategoryController@add');//分类添加页
    Route::any('/adds', 'admin\CategoryController@adds');//分裂添加
    Route::any('/list', 'admin\CategoryController@lists');//分类展示
    Route::any('/del', 'admin\CategoryController@del');//分类删除
    Route::any('/update/{id}', 'admin\CategoryController@update');//修改页
    Route::any('/updates', 'admin\CategoryController@updates');//修改页
    Route::any('/dshow', 'admin\CategoryController@dshow');//是否展示急点急改
    Route::any('/updatesort', 'admin\CategoryController@updatesort');//排序急点急改
});
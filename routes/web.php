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

/*后台注册登录*/
    Route::any('/admin/reg', 'admin\LoginController@reg');//注册页
    Route::any('/admin/regadd', 'admin\LoginController@regadd');//执行注册
    Route::any('/admin/login', 'admin\LoginController@login');//登陆
    Route::any('/admin/loginadd', 'admin\LoginController@loginadd');//登陆
    Route::any('/admin/out', 'admin\LoginController@out');//退出


Route::any('/admin', 'admin\IndexController@index')->middleware('checklogin');//后台首页

Route::prefix('/')->middleware('checklogin')->group(function() {
    Route::any('/cateadd', 'admin\IndexController@cateadd');//后台导航添加页
    Route::any('/cadd', 'admin\IndexController@cadd');//导航添加
    Route::any('/catelist', 'admin\IndexController@catelist');//导航展示
    Route::any('/del', 'admin\IndexController@del');//导航删除
    Route::any('/update/{id}', 'admin\IndexController@update');//修改页
    Route::any('/updates', 'admin\IndexController@updates');//修改页
    Route::any('/dianshow', 'admin\IndexController@dianshow');//是否展示急点急改
    Route::any('/updatesort', 'admin\IndexController@updatesort');//排序急点急改
});

/*分类*/
Route::prefix('category')->middleware('checklogin')->group(function(){
    Route::any('/add', 'admin\CategoryController@add');//分类添加页
    Route::any('/adds', 'admin\CategoryController@adds');//分类添加
    Route::any('/list', 'admin\CategoryController@lists');//分类展示
    Route::any('/del', 'admin\CategoryController@del');//分类删除
    Route::any('/update/{id}', 'admin\CategoryController@update');//修改页
    Route::any('/updates', 'admin\CategoryController@updates');//修改页
    Route::any('/dshow', 'admin\CategoryController@dshow');//是否展示急点急改
    Route::any('/updatesort', 'admin\CategoryController@updatesort');//排序急点急改
});

/*内容*/
Route::prefix('title')->middleware('checklogin')->group(function(){
    Route::any('/add', 'admin\TitleController@add');//内容添加页
    Route::any('/adds', 'admin\TitleController@adds');//内容添加
    Route::any('/list', 'admin\TitleController@lists');//内容
    Route::any('/del', 'admin\TitleController@del');//内容删除
    Route::any('/dshow', 'admin\TitleController@dshow');//是否展示急点急改
    Route::any('/updatesort', 'admin\TitleController@updatesort');//急点急改
    Route::any('/update/{id}', 'admin\TitleController@update');//修改页
    Route::any('/upd', 'admin\TitleController@upd');//修改页
});

/*留言*/
Route::prefix('voice')->middleware('checklogin')->group(function(){
    Route::any('/list', 'admin\VoiceController@lists');//内容
});

/*用户*/
Route::prefix('user')->middleware('checklogin')->group(function(){
    Route::any('/userlist', 'admin\LoginController@userlist');//用户
    Route::any('/roleadd/{id}', 'admin\LoginController@userrole');//用户添加角色
    Route::any('/userrole', 'admin\LoginController@roleadd');//执行用户添加角色
});

/*角色*/
Route::prefix('role')->middleware('checklogin')->group(function(){
    Route::any('/add', 'admin\RoleController@add');//添加页
    Route::any('/adds', 'admin\RoleController@adds');//添加
    Route::any('/list', 'admin\RoleController@lists');//展示
    Route::any('/prev/{id}', 'admin\RoleController@prev');//链接权限
    Route::any('/pret/add', 'admin\RoleController@prevadd');//链接权限
    Route::any('/del', 'admin\RoleController@del');//删除
    Route::any('/update/{id}', 'admin\RoleController@update');//修改页
    Route::any('/upd', 'admin\RoleController@upd');//修改页
});

/*权限*/
Route::prefix('prev')->middleware('checklogin')->group(function(){
    Route::any('/add', 'admin\PrevController@add');//添加页
    Route::any('/adds', 'admin\PrevController@adds');//添加
    Route::any('/list', 'admin\PrevController@lists');//展示
    Route::any('/del', 'admin\PrevController@del');//删除
    Route::any('/update/{id}', 'admin\PrevController@update');//修改页
    Route::any('/upd', 'admin\PrevController@upd');//修改页
});


#####################################前台####################################################

Route::prefix('index')->group(function(){
    Route::any('/', 'index\IndexController@index');//前台首页页


    Route::any('/cate', 'index\VueController@cate');//首页导航vue
    Route::any('/titlesou', 'index\VueController@titlesou');//首页导航vue

    Route::any('/reg', 'index\RegController@reg');//注册页
    Route::any('/regadd', 'index\RegController@regadd');//注册
    Route::any('/login', 'index\RegController@login');//登陆页
    Route::any('/loginadd', 'index\RegController@loginadd');//登陆

    Route::any('/title', 'index\TitleController@title')->middleware('indexlogin');//留言页
    Route::any('/titleadd', 'index\TitleController@titleadd');//留言
});



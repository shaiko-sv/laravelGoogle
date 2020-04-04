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

Route::get('/', 'HomeController@index')->name('main');
Route::get('/home', 'HomeController@home')->name('home');

Route::redirect('/logout', '/')->name('logout');
//    Route::get('/logout', 'HomeController@logout')->name('logout');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Admin functions
|
*/

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.',
], function () {
    Route::get('/', 'IndexController@index')->name('index');
    Route::match(['get', 'post'], '/newsCrud/create', 'NewsCrudController@create')->name('newsCrud.create');
    Route::resource('/newsCrud', 'NewsCrudController', ['except' => 'create']);
    Route::resource('/usersCrud', 'UserCrudController');
    Route::resource('/categoriesCrud', 'CategoriesCrudController');
    Route::get('/downloadImage', 'IndexController@downloadImage')->name('downloadImage');
    Route::get('/downloadJson', 'IndexController@downloadJson')->name('downloadJson');
});


/*
|--------------------------------------------------------------------------
| Site Routes
|--------------------------------------------------------------------------
|
| /news
| /new/category
|
*/

Route::group([
    'prefix' => 'news',
    'namespace' => 'News',
    'as' => 'news.',

], function () {
    Route::get('/', 'NewsController@index')->name('index');
    Route::get('/one/{id}', 'NewsController@show')
        ->name('show')
        ->where('id','[0-9]+');

    Route::group([
        'as' => 'category.',
    ], function () {
        Route::get('/category', 'CategoryController@index')->name('index');
        Route::get('/category/{name}', 'CategoryController@show')
            ->name('show')
            ->where('name','[a-z0-9]+');
    });
});

Route::get('/about', function () {
    return view('about');
});


Route::get('/laravel', function () {
    return view('admin.welcome');
});

Route::view('/vue', 'admin.vue')->name('vue');

Auth::routes();

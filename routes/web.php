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
Route::get('/excel', 'HomeController@excel')->name('excel');

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
    Route::resource('/news', 'NewsController');
    Route::resource('/users', 'UsersController');
    Route::resource('/categories', 'CategoriesController');
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
    Route::get('/one/{news}', 'NewsController@show')
        ->name('show')
        ->where('id','[0-9]+');

    Route::group([
        'as' => 'categories.',
    ], function () {
        Route::get('/categories', 'CategoriesController@index')->name('index');
        Route::get('/categories/{slug}', 'CategoriesController@show')
            ->name('show')
            ->where('name','[a-z0-9]+');
    });
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/laravel', function () {
    return view('admin.welcome');
});

Route::view('/vue', 'admin.vue')->name('vue');

Auth::routes();

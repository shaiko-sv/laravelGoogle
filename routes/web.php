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

Route::get('/', 'HomeController@index')->name('home');
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
    Route::get('/action1', 'IndexController@action1')->name('action1');
    Route::get('/action2', 'IndexController@action2')->name('action2');
});

/*
|--------------------------------------------------------------------------
| Site Routes
|--------------------------------------------------------------------------
|
| /category
| /news
|
*/



Route::group([
    'prefix' => 'news',
    'namespace' => 'News',
    'as' => 'news.',

], function () {
    Route::get('/', 'NewsController@index')->name('all');
    Route::get('/{id}', 'NewsController@show')
        ->name('id')
        ->where('id','[0-9]+');

    Route::group([
        'prefix' => 'category',
        'as' => 'category.',
    ], function () {
        Route::get('/', 'CategoryController@index')->name('all');
        Route::get('/{name}', 'CategoryController@show')
            ->name('name')
            ->where('name','[a-z0-9]+');
    });
});

Route::get('/about', function () {
    return view('about');
});


Route::get('/laravel', function () {
    return view('welcome');
});

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



// ログイン
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// 商品登録
Route::get('/posts/index','PostsController@index');
Route::get('/posts/{post}', 'PostsController@show')->where('post', '[0-9]+');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}/edit', 'PostsController@edit');
Route::patch('/posts/{post}', 'PostsController@update');
Route::delete('/posts/{post}', 'PostsController@destroy');

// カート
Route::get('/cartpost/index', 'CartPostController@index');
Route::post('/cartpost', 'CartPostController@store');
Route::delete('/cartpost/{cartpost}', 'CartPostController@destroy');


// buy
Route::post('/buy', 'BuyController@store');
Route::get('/buy/index', 'BuyController@index');

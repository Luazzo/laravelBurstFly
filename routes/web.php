<?php

	use TCG\Voyager\Facades\Voyager;
	
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/
//ajaxComment
Route::get('ajax/comment', 'CommentController@addComment')->name('ajax.insertComment');




//index
Route::get('/','PostController@index')->name('home'); //OU COMME çA: Route::get('/categories/{slug}', ['as'=>'category.posts', 'uses'=> 'PostController@show']);
Route::get('/post/{slug}','PostController@show')->name('postShow'); //OU COMME çA: Route::get('/categories/{slug}', ['as'=>'category.posts', 'uses'=> 'PostController@show']);
Route::get('/home','PostController@index')->name('home'); //OU COMME çA: Route::get('/categories/{slug}', ['as'=>'category.posts', 'uses'=> 'PostController@show']);

//category.posts
Route::get('/categories/{slug}','PostController@indexByCategory')->name('category.posts'); //OU COMME çA: Route::get('/categories/{slug}', ['as'=>'category.posts', 'uses'=> 'PostController@show']);

//routes de Voyager
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

//Routes d'Authintification
Auth::routes();



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

<?php

	use TCG\Voyager\Facades\Voyager;
	use App\Post;
	
	
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

//index
Route::get('/','PostController@index')->name('index'); //OU COMME çA: Route::get('/categories/{slug}', ['as'=>'category.posts', 'uses'=> 'PostController@show']);

//category.posts
Route::get('/categories/{slug}','PostController@indexByCategory')->name('category.posts'); //OU COMME çA: Route::get('/categories/{slug}', ['as'=>'category.posts', 'uses'=> 'PostController@show']);

//postShow
Route::get('/posts/{slug}','PostController@show')->name('postShow');

//routes de Voyager
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

//Routes d'Authintification
Auth::routes();


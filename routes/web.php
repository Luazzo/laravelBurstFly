<?php

	use TCG\Voyager\Facades\Voyager;
	use Illuminate\Support\Facades\Auth;// je l'ajoute pour avoir acces aux files de AUTH
	
	
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

//post.show
Route::get('/post/{slug}','PostController@show')->name('post.show'); //OU COMME çA: Route::get('/categories/{slug}', ['as'=>'category.posts', 'uses'=> 'PostController@show']);

//category.posts
Route::get('/categories/{slug}','PostController@indexByCategory')->name('category.posts'); //OU COMME çA: Route::get('/categories/{slug}', ['as'=>'category.posts', 'uses'=> 'PostController@show']);

//routes de Voyager
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

//Routes d'Authintification
Auth::routes();

//Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

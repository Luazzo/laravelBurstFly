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
Route::get('/','PostController@index')->name('home');

//postShow
Route::get('/post/{slug}','PostController@show')->name('post.show');
//category.posts
Route::get('/categories/{slug}','PostController@indexByCategory')->name('category.posts');
//routes de Voyager
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
//Routes d'Authintification
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('register', 'Auth\RegisterController@create')->name('register');


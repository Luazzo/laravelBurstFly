<?php
use TCG\Voyager\Facades\Voyager;

Route::group(['middleware' => 'web'], function() {
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
    Route::get('home', 'PostController@index')->name('home');
    Route::get('', 'PostController@index')->name('homePage');
//posts
    Route::get('create/post', 'PostController@create')->name('post.create')->middleware('auth');
    Route::get('post/{slug}', 'PostController@show')->name('post.show');
    Route::get('post/edit/{id}', 'PostController@edit')->name('post.edit')->middleware('auth');
    Route::post('post/store', 'PostController@store')->name('post.store')->middleware('auth');
    Route::post('post/valid', 'PostController@valid')->name('post.valid')->middleware('auth');
    Route::delete('post/delete/{id}', 'PostController@destroy')->name('post.delete')->middleware('auth');
    //category.posts
    Route::get('categories/{slug}', 'PostController@indexByCategory')->name('category.posts');
//routes de Voyager
    Route::group(['prefix' => 'admin'], function () {
        Voyager::routes();
    });
//Routes d'Authintification
    Auth::routes();
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
    Route::get('register', 'Auth\RegisterController@create')->name('register');
    //profile
    Route::get('profile/{id}', 'ProfileController@show')->name('profile')->middleware('auth');;
    Route::post('profile/edit', 'ProfileController@edit')->name('profile.edit')->middleware('auth');;

//Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

});
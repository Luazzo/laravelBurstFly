<?php
use TCG\Voyager\Facades\Voyager;

Route::get('/post/{slug}','PostController@show')->name('post.show');

//index
Route::get('/','PostController@index')->name('home'); //OU COMME çA: Route::get('/categories/{slug}', ['as'=>'category.posts', 'uses'=> 'PostController@show']);
//Route::get('/post/{slug}','PostController@show')->name('postShow'); //OU COMME çA: Route::get('/categories/{slug}', ['as'=>'category.posts', 'uses'=> 'PostController@show']);
Route::get('/home','PostController@index')->name('home'); //OU COMME çA: Route::get('/categories/{slug}', ['as'=>'category.posts', 'uses'=> 'PostController@show']);

//category.posts
Route::get('/categories/{slug}','PostController@indexByCategory')->name('category.posts'); //OU COMME çA: Route::get('/categories/{slug}', ['as'=>'category.posts', 'uses'=> 'PostController@show']);

//routes de Voyager
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::post('/mil',function(){
    dd('hello');
})->name('mil');

//Routes d'Authintification
Auth::routes();



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

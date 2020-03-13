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



/*
Route::get('/hello', function () {
    return "<h1> Hello world </h1>";
});


// Pour créer une route dynamique 
Route::get('/users/{id}', function($id) {
    return "This is user " . $id; 
});
*/

Route::get('/', 'HomeController@index'); 
Route::get('/articles', 'ArticlesController@articles'); 
Route::get('/contact', 'ContactController@contact'); 

Route::get('articles/{post_name}', 'PostsController@show');
Route::post('/contact', 'ContactController@store');









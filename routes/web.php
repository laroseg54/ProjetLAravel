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

//Route::get('/articles/{post_name}', 'PostsController@show');
//Route::get('/articles', 'PostsController@articles')->middleware("auth");

Route::get('/contact', 'ContactController@contact'); 
Route::post('/contact', 'ContactController@store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/administration','AdministrationController@administration')->name('administration');

Route::resource('articles.comments', 'CommentsController')->shallow();

Route::get('{user}/articles','ArticlesController@showUserArticles')->name('user_articles');
Route::resource('/articles', 'ArticlesController');

//Laravel Socialite with github
Route::get('/sign-in/{provider}', 'Auth\LoginController@provider');
Route::get('/sign-in/{provider}/redirect', 'Auth\LoginController@redirectToProvider');



// Route::get('/sign-in/google', 'Auth\LoginController@google');
// Route::get('/sign-in/google/redirect', 'Auth\LoginController@googleRedirect');
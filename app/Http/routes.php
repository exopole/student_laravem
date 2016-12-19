<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::pattern('id', '[1-9][0-9]*');
Route::pattern('slug', '[a-zA-Z\-]*');

Route::get('/', 'FrontController@index')->name('home');
Route::get('/article/{id}/{title?}', 'FrontController@show');
Route::get('/students/{id}', 'FrontController@student');
Route::get('/category/{id}', 'FrontController@category');
Route::get('/tag/{id}', 'FrontController@tag');
Route::get('/user/{id}', 'FrontController@showPostByUser');


Route::resource('admin/post', 'PostController');

Route::any('login', 'LoginController@login');

Route::get('logout', 'LoginController@logout');


// passer un paramètre variable dans l'uri 
/*Route::get('/category/{title}/{id}', function ($title, $id) {
    return "titre de la catégorie: $title, et id de la category: $id";
    // return view('welcome');
});
*/

/* 
Route::get('test', function () {
    $posts = [['title' => 'php7'], ['title' => 'mysql']];
    extract(['data' => $posts, 'foo' => 125, 'bar' => 100]);
    var_dump($foo);
    var_dump($bar);
    dd($data);
});
*/

/* une autre route
Route::get('/posts', function () {
    return "hello posts";
    // return view('welcome');
});*/

/*Route::get('/', function () {
    return "hello laravel";
   // return view('welcome');
});*/
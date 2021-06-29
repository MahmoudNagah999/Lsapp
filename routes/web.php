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

/*Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return '<h1>hello world</h1>';
});
Route::get('/about', function () {
    return view('pages.about');
});
Route::get('/user/{id}/{name}', function ($id , $name) {
    return 'this is user '.$name.'with an id of '.$id ;
});
*/

Route::get('/', 'pagescontroller@index');
Route::get('/index', 'pagescontroller@index');

Route::get('about', 'pagescontroller@about');

Route::get('services','pagescontroller@services');

Route::resource('posts','postscontroller');

Auth::routes();

Route::get('/dashboard', 'dashboardController@index');

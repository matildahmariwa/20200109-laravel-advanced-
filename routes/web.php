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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/s', function () {
    return view('sss');
});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'BlogsController@ShowFood')->name('search');

Route::get('/create', 'BlogsController@create')->name('create');

Route::resource('blogs', 'BlogsController');

Route::post('/delete', 'BlogsController@destroy');

Route::post('/edit', 'BlogsController@edit')->name('edit');

Route::post('/update', 'BlogsController@update');

Route::bind('blogs', function ($id){

    return App\Blog::where('id', $id)-­>first();

});
Route::get('/blog', 'BlogsController@index');

Route::post('/add', 'BlogsController@store');

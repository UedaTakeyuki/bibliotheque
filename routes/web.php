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
Route::group(['middleware' => ['auth']], function () {
  // refer https://qiita.com/washio12/items/59f5cde23b4205973c6b
	Route::get('/', function () {
    return view('welcome');
	});
	Route::resource('bibliographies','BibliographyController');

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

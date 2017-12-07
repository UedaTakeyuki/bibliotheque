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
	Route::get('/bibliographies/create/{command?,addISBN?,}', function () {
		if (isset($command)&&isset($barcord)&&($command=="addISBN")){
		  // read bibliographicals from NDL and put it on the FORM.
		  if (mb_strlen($barcord) == 10 
		      || (mb_strlen($barcord) == 13
		          && (substr($barcord,0,3) == "978" || substr($barcord,0,3) == "979"))){
		    $ndl = new NDLsearch($barcord);
		    session(['isbn' => $barcord]);
		    session(['title' => (string)$ndl->title()]);
		    session(['creator' => (string)$ndl->creator()]);
		    session(['publisher' => (string)$ndl->publisher()]);
		  } else {
		    $error_str = "ISBN コードではありません";
		  }
		};
		if (isset($command)&&isset($barcord)&&($command=="addJAN")){
		  // read the price and put it on the FORM.
		  if (mb_strlen($barcord) == 13
		    && (substr($barcord,0,3) == "191" || substr($barcord,0,3) == "192")){
		    session(['price' => intval(substr($barcord,7,5))."円"]);
		  } else {
		    $error_str = "書籍JAN コードではありません";
		  }
		};
		return view('bibliographies.add');
	});
	Route::resource('bibliographies','BibliographyController');

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

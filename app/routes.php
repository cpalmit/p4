<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', 'AccountController@getIndex');
Route::post('/', 'AccountController@postIndex');

Route::get('/search', 'AccountController@getSearch');
Route::post('/search', 'AccountController@postSearch');

Route::get('/create', 'AccountController@getCreate');
Route::post('/create', 'AccountController@postCreate');

Route::get('/edit/{id}', 'AccountController@getEdit');
Route::post('/edit', 'AccountController@postEdit');

Route::get('/select', 'AccountController@getSelect');
Route::post('/select', 'AccountController@postSelect');
Route::post('/delete', 'AccountController@postDelete');




Route::get('/test', function() {
	echo "<table class='table'><tbody>";
	echo Account::printrow();
	echo "</tbody></table>";
		
});


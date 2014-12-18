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

Route::get('/search', 'AccountController@getSearch'
);
Route::post('/search', 'AccountController@postSearch'
);

Route::get('/create', 'AccountController@getCreate');
Route::post('/create', 'AccountController@postCreate');

Route::get('/edit/{id}', 'AccountController@getEdit');
Route::post('/edit', 'AccountController@postEdit');

Route::get('/select', 'AccountController@getSelect');
Route::post('/select', 'AccountController@postSelect');
Route::post('/delete', 'AccountController@postDelete');





Route::get('/printall', function() {

    $accounts = Account::all();

    # Make sure we have results before trying to print them...
    if($accounts->isEmpty() != TRUE) {

        # Typically we'd pass $books to a View, but for quick and dirty demonstration, let's just output here...
        foreach($accounts as $account) {
        	$twitter = $account->twitter;
        	
        	if ($twitter) {
        		$tweet = '<a href="' . $account->twitter. '" /> <img src="images/twitter.png" height="20" width="20" /></a>';
        	} else {
        		$tweet = "";
        	}
        	
        	//echo $account->name. ' | <a href="' . $account->twitter. '" /> <img src="images/twitter.png" /></a><br>';
        	echo $account->name . ' '. $tweet . '<br>';
        }
    } else {
        return 'No accounts found';
    }

});

Route::get('/test', function() {
	

});


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

Route::get('/create', 'AccountController@getCreate');
Route::post('/create', 'AccountController@postCreate');


Route::get('/createcat', function() {

    # Instantiate a new Category model class
    $category = new Category();

    # Set 
    $category->name = "sports";

    # This is where the Eloquent ORM magic happens
    $category->save();

    return "Category added.";

});




Route::get('/printall', function() {

    # The all() method will fetch all the rows from a Model/table
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

Route::get('/getacaddept', function() {

	$accounts = Account::where('category_id','LIKE',4)->get();

	if($accounts){
		foreach($accounts as $account) {
            echo $account->name.'<br>';
        }
        
	} else {
		echo "sorry";
	}
	
	

});


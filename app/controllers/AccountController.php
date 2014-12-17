<?php

class AccountController extends BaseController {

	public function __construct() {
		# Make sure BaseController construct gets called
		parent::__construct();
	}


	// show homepage with all accounts
	public function getIndex() {
		$accounts=Account::all();
		
		return View::make('index')
			->with('accounts',$accounts);
	}



	// form to create a new account
	public function getCreate() {
		$categories=Category::getCategory();
		return View::make('create')
			->with('categories',$categories);
	}
	
	
	
	// process create new account form
	public function postCreate() {

		$account = new Account();
		$account->fill(Input::all());
		$account->save();

		return Redirect::action('AccountController@getIndex')->with('flash_message','Your account has been added.');
	}

	
	// form to edit account
	public function getEdit($id) {
		try {
			// get all the categories in case you want to change that
			$categories=Category::getCategory();
			
			// get account 
		    $account = Account::where('id','=',$id)->findorFail($id);
		    
			} catch(exception $e) {
		    	return Redirect::action('AccountController@getIndex')->with('flash_message', 'Account not found');
			}
    	return View::make('edit')
    		->with('account', $account)
    		->with('categories', $categories);
	}
	
	
	
	// process form to edit account- brute force for now. Ideally it only updates unchanged fields.
	public function postEdit() {
		try {
			$id = Input::get('id');
			$account = Account::where('id','=',$id)->findorFail($id);
	    } catch(exception $e) {
	        return Redirect::action('AccountController@getIndex')->with('flash_message', 'Account not found');
	    }
	    
	    try {
		    $account->fill(Input::all());
		    $account->save();
		    
		   	return Redirect::action('AccountController@getIndex')->with('flash_message','Your changes have been saved.');
		}
		catch(exception $e) {
	        return Redirect::action('AccountController@getIndex')->with('flash_message', 'Error saving changes.');
	    }

	}
	
	// process account deletion
	public function postDelete() {
		
		try {
	        $account = Account::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::action('AccountController@getIndex')->with('flash_message', 'Could not delete account - not found.');
	    }
	    Account::destroy(Input::get('id'));
	    return Redirect::action('AccountController@getIndex')->with('flash_message', 'Account deleted.');
	}



}
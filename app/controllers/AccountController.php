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
		$account->fill(Input::except('categories'));
		$account->save();

		return Redirect::action('AccountController@getIndex')->with('flash_message','Your account has been added.');
	}

	
	// form to edit account
	public function getEdit($id) {
		try {
			// get all the categories in case you want to change that
			$categories=Category::getCategory();
			
			// get account 
		    $account = Account::where('id','LIKE',$id)->findorFail($id);
		    //$account = Account::where('id','LIKE',$id)->get();
		    
			} catch(exception $e) {
		    return Redirect::action('AccountController@getIndex')->with('flash_message', 'Account not found');
		}
    	return View::make('edit')
    		->with('account', $account)
    		->with('categories', $categories);
	}
	
	
	
	// process form to edit account
	public function postEdit() {
	
	}
	
	// process account deletion
	public function postDelete() {
	
	}



}
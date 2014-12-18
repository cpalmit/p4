<?php

class AccountController extends BaseController {

	public function __construct() {
		# Make sure BaseController construct gets called
		parent::__construct();
	}


	// show homepage with all accounts
	public function getIndex() {
		//$accounts=Account::orderBy('name')->get();
		$query=null;
		return View::make('index')
			->with('query',$query);		
			
	}
	
	// search results are posted back to index
	public function postIndex() {
		$query = Input::get('query');
		
		if($query==null) {
			 return Redirect::action('AccountController@getIndex')
	        	->with('flash_message', 'Please enter a search term.');
	    } 
	    
	    $accounts = Account::search($query);
		if($accounts->isEmpty()) {
			return Redirect::action('AccountController@getIndex')
	        	->with('flash_message', 'Sorry, no accounts found when searching for "' . $query .'".');
		} else {
			return View::make('index')
				->with('accounts',$accounts)
				->with('query',$query);
		}
	
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

	// getSelect and postSelect are to get you to the edit page.
	// form to select the item you want to edit
	public function getSelect() {
		$accounts=Account::getAccounts();
		return View::make('select')
    			->with('accounts', $accounts);
	}
	
	// sends select results to getEdit
	public function postSelect() {
	
		$input = Input::all();
		$id = $input['account'];
		//Log::info("This is the id from postSelect" . $id);
		return Redirect::action('AccountController@getEdit', array($id));
	}

	
	// form to edit account
	public function getEdit($id) {
	
		//Log::info("Look, it's getEdit! Here's the id " . $id);
		$accounts=Account::getAccounts();

		if (isset($id)) {
			$account = Account::where('id','=',$id)->findorFail($id);
			// get all the categories in case you want to change that
			$categories=Category::getCategory();
			//Log::info("made it to the if");
			return View::make('edit')
    			->with('account', $account)
    			->with('accounts', $accounts)
    			->with('categories', $categories);
		 }	
    	
	}
	
	
	
	// process form to edit account 
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
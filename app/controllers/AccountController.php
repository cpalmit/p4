<?php

class AccountController extends BaseController {

	public function __construct() {
		# Make sure BaseController construct gets called
		parent::__construct();
	}


	// show homepage with all accounts
	public function getIndex() {
		return View::make('index');
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
	
	}
	
	
	// process form to edit account
	public function postEdit() {
	
	}
	
	// process account deletion
	public function postDelete() {
	
	}



}
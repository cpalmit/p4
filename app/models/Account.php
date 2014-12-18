<?php

class Account extends Eloquent { 
	
	// protected fields
	protected $guarded = array('id', 'created_at', 'updated_at');

    public function category() {
    
        // account belongs to category
        // Define an inverse one-to-many relationship.
        return $this->belongsTo('Category');
    }
    
    
    // search accounts
    public static function search($query) {
        if($query) {
          
            $accounts = Account::with('category')
            ->whereHas('category', function($q) use($query) {
                $q->where('name', 'LIKE', "%$query%");
            })
            ->orWhere('name', 'LIKE', "%$query%")
            ->orderBy('name')->get();
        }
        /* Otherwise, return null
        else {
            $accounts = null;
        }*/
        return $accounts;
    }    
    
    // return list of all accounts
    public static function getAccounts() {
		$accounts = Array();
		$collection = Account::all();
			foreach($collection as $account) {
				$accounts[$account->id] = $account->name;
			}
		return $accounts;
	}
    
    /*
    public static function printAccount() {
    
        $accounts = Account::all();

		# Make sure we have results before trying to print them...
		if($accounts->isEmpty() != TRUE) {

		
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
    
    }
    */
    
    
}
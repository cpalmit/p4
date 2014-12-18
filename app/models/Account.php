<?php

class Account extends Eloquent { 
	
	// protected fields
	protected $guarded = array('id', 'created_at', 'updated_at');

    public function category() {
    
        // account belongs to category
        // Define an inverse one-to-many relationship.
        return $this->belongsTo('Category');
    }
    
    
    // search accounts by name or category
    public static function search($query) {
        if($query) {
          
            $accounts = Account::with('category')
            ->whereHas('category', function($q) use($query) {
                $q->where('name', 'LIKE', "%$query%");
            })
            ->orWhere('name', 'LIKE', "%$query%")
            ->orderBy('name')->get();
        }
        
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
	
	// helper function- a somewhat crazy looking function that checks whether or not a site exists for a given account
	// and puts it in a td if it does exist
	public static function exist($var, $type) {
		$site = $var->$type;
		
		 	if ($site) {
					$td = '<td><a href="'.$site.'" target="_blank" /><img src="images/'.$type.'.png" height="30" width="30" /></a></td>';
				} else {
					$td = '<td></td>';
				}
			return $td;
	}
	
	// helper function- does the social media account exist?
	public static function printrows($query) {
	
		
		Log::info("query is " . $query);
		if ($query==null) {
			$collection = Account::orderBy('name')->get();
		
		} else {
			$collection = Account::search($query);
		}
		
		 	foreach($collection as $account){
		 		$row = '<td>'.$account->name.'</a></td>';
				$row .= Account::exist($account,"website");
				$row .= Account::exist($account,"facebook");
				$row .= Account::exist($account,"twitter");
				$row .= Account::exist($account,"instagram");
				$row .= Account::exist($account,"youtube");
				$row .= Account::exist($account,"tumblr");
				$row .= Account::exist($account,"flickr");
			
				echo "<tr>".$row."</tr>";
			}
		 
	}
	
    
    
}
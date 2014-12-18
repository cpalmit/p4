<?php
class SocialDirectorySeeder extends Seeder {
	public function run() {
		// Clear the tables to a blank slate
		DB::statement("SET FOREIGN_KEY_CHECKS=0"); # Disable FK constraints so that all rows can be deleted, even if there"s an associated FK
		DB::statement("TRUNCATE accounts");
		DB::statement("TRUNCATE categories");
		DB::statement("TRUNCATE holds");

		// categories
		$orgs = new Category;
		$orgs->name = "Student Organizations";
		$orgs->save();
		$sports = new Category;
		$sports->name = "Athletics Teams";
		$sports->save();
		$adminDepts = new Category;
		$adminDepts->name = "Administrative Departments";
		$adminDepts->save();
		$acadDepts = new Category;
		$acadDepts->name = "Academic Departments";
		$acadDepts->save();
		$dorms = new Category;
		$dorms->name = "Residence Halls";
		$dorms->save();		

		// accounts
		$wellesley = new Account;
		$wellesley->name = "Wellesley College";
		$wellesley->website = "http://www.wellesley.edu";
		$wellesley->facebook = "http://facebook.com/wellesleycollege";
		$wellesley->twitter = "http://www.twitter.com/wellesley";
		$wellesley->instagram = "http://www.instagram.com/wellesleycollege";
		$wellesley->youtube = "http://www.youtube.com/wellesleycollege";
		$wellesley->flickr = "https://www.flickr.com/photos/wellesleycollege";
		$wellesley->category()->associate($adminDepts); 
		$wellesley->save();
		
		$artscal = new Account;
		$artscal->name = "The Arts at Wellesley";
		$artscal->website = "http://www.wellesley.edu/events/artevents";
		$artscal->category()->associate($adminDepts); 
		$artscal->save();
	
		$bluejazz = new Account;
		$bluejazz->name = "Blue Jazz";
		$bluejazz->website = "https://sites.google.com/a/wellesley.edu/wellesleycarillonneurs/";
		$bluejazz->facebook = "https://www.facebook.com/wellesleybells";
		$bluejazz->twitter = "https://www.twitter.com/wellesleybells";
		$bluejazz->category()->associate($orgs); 
		$bluejazz->save();
		
		$guild = new Account;
		$guild->name = "Guild of Carillonneurs";
		$guild->website = "https://sites.google.com/a/wellesley.edu/bluejazz-strings/";
		$guild->facebook = "https://www.facebook.com/WellesleyBlueJazz";
		$guild->twitter = "https://www.twitter.com/bluejazznotes";
		$guild->category()->associate($orgs); 
		$guild->save();
		
		$hoop = new Account;
		$hoop->name = "Cafe Hoop";
		$hoop->facebook = "https://www.facebook.com/pages/Caf%C3%A9-Hoop/206487383437";
		$hoop->tumblr = "http://cafehoop.tumblr.com/";
		$hoop->category()->associate($orgs); 
		$hoop->save();
		
		
		$chemistry= new Account;
		$chemistry->name = "Chemistry Department";
		$chemistry->website = "https://www.wellesley.edu/chemistry";
		$chemistry->facebook = "http://www.facebook.com/pages/Wellesley-College-Chemistry-Department/110509715636633";
		$chemistry->category()->associate($acadDepts);
		$chemistry->save();
		
		$russian= new Account;
		$russian->name = "Russian Department";
		$russian->website = "https://www.wellesley.edu/russian";
		$russian->facebook = "https://www.facebook.com/WellesleyRussian";
		$russian->twitter = "https://twitter.com/WCRussian";
		$russian->category()->associate($acadDepts);
		$russian->save();
		
		$crew= new Account;
		$crew->name = "Varsity Crew";
		$crew->website = "http://www.wellesleyblue.com/sports/wcrew/index";
		$crew->facebook = "https://www.facebook.com/pages/Wellesley-Crew/167109603328535?fref=ts";
		$crew->twitter = "https://twitter.com/wellesleycrew";
		$crew->category()->associate($sports);
		$crew->save();
		
		$soccer= new Account;
		$soccer->name = "Varsity Crew";
		$soccer->website = "http://www.wellesleyblue.com/sports/wsoc/index";
		$soccer->facebook = "https://www.facebook.com/pages/Wellesley-Womens-Soccer/194086164740";
		$soccer->twitter = "https://twitter.com/WellesleySoc";
		$soccer->category()->associate($sports);
		$soccer->save();

		$tower= new Account;
		$tower->name = "Tower Hall";
		$tower->twitter = "https://twitter.com/TowerCourtTweet";
		$tower->category()->associate($dorm);
		$tower->save();
		
	}
}
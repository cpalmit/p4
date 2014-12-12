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
		# Associate has to be called *before* the account is created (save())
		$wellesley->category()->associate($adminDepts); 
		$wellesley->save();

		$bluejazz = new Account;
		$bluejazz->name = "Blue Jazz";
		$bluejazz->website = "https://sites.google.com/a/wellesley.edu/bluejazz-strings/";
		$bluejazz->facebook = "https://www.facebook.com/WellesleyBlueJazz";
		$bluejazz->twitter = "https://www.twitter.com/bluejazznotes";
		# Associate has to be called *before* the account is created (save())
		$bluejazz->category()->associate($orgs); 
		$bluejazz->save();
		
		$chemistry= new Account;
		$chemistry->name = "Chemistry Department";
		$chemistry->website = "https://www.wellesley.edu/chemistry";
		$chemistry->facebook = "http://www.facebook.com/pages/Wellesley-College-Chemistry-Department/110509715636633";
		$chemistry->category()->associate($acadDepts);
		$chemistry->save();


	}
}
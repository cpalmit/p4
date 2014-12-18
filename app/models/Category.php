<?php

class Category extends Eloquent { 

    public function account() {
    
        //category has many accounts
        return $this->hasMany("Account");
    }
    
    
    public static function getCategory() {
		$categories = Array();
		$collection = Category::all();
			foreach($collection as $category) {
				$categories[$category->id] = $category->name;
			}
		return $categories;
	}
    
    
    
}
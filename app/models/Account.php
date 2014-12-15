<?php

class Account extends Eloquent { 
	
	// protected fields
	protected $guarded = array('id', 'created_at', 'updated_at');

    public function category() {
    
        // account belongs to category
        // Define an inverse one-to-many relationship.
        return $this->belongsTo('Category');
    }
    
    
    
    
    
}
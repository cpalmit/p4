<?

class Account extends Eloquent { 

    public function category() {
    
        // account belongs to category
        // Define an inverse one-to-many relationship.
        return $this->belongsTo('Category');
    }
    
}
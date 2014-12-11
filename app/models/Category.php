<?php

class Category extends Eloquent { 

    public function account() {
    
        //category has many accounts
        return $this->hasMany('Account');
    }
}
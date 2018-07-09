<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    public function order(){
	

    	return $this->belongsToMany('App\Order')->withTimestamps();
  	}

  	 public function branch(){
	

    	return $this->belongsToMany('App\Branch')->withTimestamps();
  	}
}

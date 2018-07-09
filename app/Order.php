<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function product(){
	

    	return $this->belongsToMany('App\Product')->withTimestamps();
  	}

  	public function branch() {
    	return $this->belongsTo('App\Branch');
	}

}

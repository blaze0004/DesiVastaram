<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    //

    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function profile() {
    	return $this->belongsTo('App\Profile');
    }
}

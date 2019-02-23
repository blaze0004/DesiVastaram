<?php

namespace App;

use App\Address;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
	use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $guarded = [];
    //


    public function addresses() {
    	return $this->hasMany(Address::class);
    }
   
   	public function currentAddress() {
   		return $this->hasOne(Address::class, 'current_address_id', 'address');
   	}

    public function user() {
      return $this->belongsTo(User::class);
    }
}

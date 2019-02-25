<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //

	protected $fillable = [
		'user_id',
		'firstName',
		'lastName',
		'address_1',
		'address_2',
		'phone',
		'city_id',
		'state_id',
		'country_id',
		'zipcode'
	];
    protected function completeAddress() {
    	$streetName = '';
    	$cityName = '';
    	$stateName = '';
    	$countryName = '';

    	return 'hello';	
    }
}

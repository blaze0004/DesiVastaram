<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //

    protected $fillable = ['name', 'country_id', 'code'];

    public function cities() {
    	return $this->hasMany(City::class);
    }
}

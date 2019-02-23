<?php

namespace App;

use App\Image;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //

	public function product() {
		return $this->belongsTo('App\Image');
	}	
}

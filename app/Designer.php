<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designer extends Model
{
    //

       protected $guarded = [];


        public function thumbnailPath() {
        return urldecode('/images/designer/'.$this->id.'/'.$this->thumbnail);
    }
}

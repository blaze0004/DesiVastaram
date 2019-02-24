<?php

namespace App;

use App\OrderDetail;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
	protected $fillable = ['user_id', 'order_date'];

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function orderDetails() {
    	return $this->belongsToMany(OrderDetail::class);
    }
}

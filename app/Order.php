<?php

namespace App;

use App\Cart;
use App\OrderDetail;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    //
	protected $fillable = ['user_id', 'order_date', 'payment_id', 'billing_info_id'];

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function orderDetails() {
    	return $this->hasMany(OrderDetail::class);
    }

    public function billingInfo() {
        return $this->belongsTo(billingInfo::class);
    }

    public static function totalCartAmount() {
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        $subTotal = 0;
        foreach($cart as $cartItem) {
            $subTotal += ($cartItem->product->price - $cartItem->product->discount_price)*($cartItem->qty);
        }
        return $subTotal;
    }

     public static function totalOrderAmount() {
        $order = Order::where('user_id', Auth::user()->id)->first();
        $orderDetails = OrderDetail::where('order_id', $order->id)->get();
        $subTotal = 0;
        foreach($orderDetails as $orderDetail) {
            $subTotal += ($orderDetail->product->price - $orderDetail->product->discount_price)*($orderDetail->qty);
        }
        return $subTotal;
    }
}

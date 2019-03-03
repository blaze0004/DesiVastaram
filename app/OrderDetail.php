<?php

namespace App;

use App\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class OrderDetail extends Model
{
    //

    protected $guarded = ['*'];

    public function product() {
    	return $this->belongsTo(Product::class);
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

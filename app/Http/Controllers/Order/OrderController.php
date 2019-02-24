<?php

namespace App\Http\Controllers\Order;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Charge;
use Stripe\Stripe;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        return view('customer-orders');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $orders = User::findOrFail($id)->orders->paginate(3);

        return view('admin.buyers.allOrders', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showAllOrders($id)
    {
        $orders = User::findOrFail($id)->orders->paginate(3);

        return view('admin.buyers.allOrders', compact('orders'));
    }

    public function history()
    {

        return view('customer-orders');
    }

    public function showOrderDetails()
    {

        return view('customer-order');
    }

    public function checkoutForm()
    {

        $profile = User::findOrFail(Auth::user()->id);

        return view('checkout', compact('profile'));
    }

    // Confirm CheckOut To Place the Order

    public function makeCheckout(Request $request)
    {

/*        Stripe::setApiKey('sk_test_tRkW8hFpTlbnYOvw1EycvdPr');

        $charge = Charge::create([
            'amount'        => 10000,
            'currency'      => 'usd',
            'source'        => $request->stripeToken,
            'receipt_email' => 'admin@admin.com',
        ]);

        if ($charge->status == "failed") {

        } else {
*/          
            $cart = Cart::where(['user_id' => Auth::user()->id])->get();
            $order = Order::create([
                'user_id' => Auth::id(),
                'order_date' => now()
            ]);

            foreach($cart as $cartItem) {
                $order->orderDetails->create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product->id,
                    'qty' => $cartItem->qty,
                    'discount' => $cartItem->product->discount_price,
                    'unit_price' => $cartItem->product->price
                ]);
            }

            




 /*       }*/

        return redirect('/')->with('message', 'Order Successfully Placed');
    }
}

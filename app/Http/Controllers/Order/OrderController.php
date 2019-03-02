<?php

namespace App\Http\Controllers\Order;

use App\Address;
use App\BillingInfo;
use App\Cart;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function history($id)
    {
        $orders = Order::where('user_id', $id)->paginate(4);
        //   dd($orders);
        if (Auth::user()->role_id == '4' && User::where('id', $id)->first()->role->name == 'Seller');
        {
            $trainee = User::where('id', $id)->first()->profile;
            return view('customer-orders', compact('trainee', 'orders'));
        }
        return view('customer-orders', compact('orders'));
    }

    public function showOrderDetails()
    {

        return view('customer-order');
    }

    public function checkoutForm()
    {

        $profile   = User::findOrFail(Auth::user()->id);
        $addresses = Address::where(['user_id' => Auth::user()->id])->get();
        if (Auth::user()->cartItems->count() > 0) {
            return view('checkout', compact('profile', 'addresses'));

        } else {
            return redirect('/')->with('error', 'Please Add/Buy Something first!');
        }
    }

    // Confirm CheckOut To Place the Order

    public function totalOrderAmount()
    {
        $cart     = Cart::where('user_id', Auth::user()->id)->get();
        $subTotal = 0;
        foreach ($cart as $cartItem) {
            $subtotal += ($cartItem->product->price - $cartItem->product->discount_price) * ($cartItem->qty);
        }
        return $subtotal;
    }

    public function makeCheckout(Request $request)
    {

        if ($request->payment_method == 1) {
            Stripe::setApiKey('sk_test_tRkW8hFpTlbnYOvw1EycvdPr');
            DB::transaction(function () use ($request) {
                $charge = Charge::create([
                    'amount'        => Order::totalCartAmount(),
                    'currency'      => 'usd',
                    'source'        => $request->stripeToken,
                    'receipt_email' => Auth::user()->email,
                ]);

                if ($charge->status == "failed") {

                } else {

                    $address                    = Address::findOrFail($request->address_id)->first();
                    $billingAddress             = new BillingInfo();
                    $billingAddress->user_id    = Auth::user()->id;
                    $billingAddress->firstName  = $address->firstName;
                    $billingAddress->lastName   = $address->lastName;
                    $billingAddress->address_1  = $address->address_1;
                    $billingAddress->address_2  = $address->address_2;
                    $billingAddress->phone      = $address->phone;
                    $billingAddress->city_id    = $address->city_id;
                    $billingAddress->state_id   = $address->state_id;
                    $billingAddress->country_id = $address->country_id;
                    $billingAddress->zipcode    = $address->zipcode;

                    $billingAddress->save();

                    $cart  = Cart::where(['user_id' => Auth::user()->id])->get();
                    $order = Order::create([
                        'user_id'         => Auth::id(),
                        'billing_info_id' => $billingAddress->id,
                        'payment_id'      => $charge->id,
                        'order_date'      => Carbon::now()->toDateTimeString(),
                    ]);



                    foreach ($cart as $cartItem) {
                        OrderDetail::create([
                            'order_id'   => $order->id,
                            'product_id' => $cartItem->product->id,
                            'qty'        => $cartItem->qty,
                            'seller_id'  => $cartItem->product->user_id,
                            'discount'   => $cartItem->product->discount_price,
                            'unit_price' => $cartItem->product->price,
                        ]);
                        $cartItem->delete();
                    }

                }
            });

        } else if ($request->payment_method == 2) {
            DB::transaction(function () use ($request) {
                

                    $address                    = Address::findOrFail($request->address_id)->first();
                    $billingAddress             = new BillingInfo();
                    $billingAddress->user_id    = Auth::user()->id;
                    $billingAddress->firstName  = $address->firstName;
                    $billingAddress->lastName   = $address->lastName;
                    $billingAddress->address_1  = $address->address_1;
                    $billingAddress->address_2  = $address->address_2;
                    $billingAddress->phone      = $address->phone;
                    $billingAddress->city_id    = $address->city_id;
                    $billingAddress->state_id   = $address->state_id;
                    $billingAddress->country_id = $address->country_id;
                    $billingAddress->zipcode    = $address->zipcode;

                    $billingAddress->save();

                    $cart  = Cart::where(['user_id' => Auth::user()->id])->get();
                    $order = Order::create([
                        'user_id'         => Auth::id(),
                        'billing_info_id' => $billingAddress->id,
                        'payment_id'      => 'cod',
                        'order_date'      => Carbon::now()->toDateTimeString(),
                    ]);

                    foreach ($cart as $cartItem) {
                        OrderDetail::create([
                            'order_id'   => $order->id,
                            'product_id' => $cartItem->product->id,
                            'qty'        => $cartItem->qty,
                            'seller_id'  => $cartItem->product->user_id,
                            'discount'   => $cartItem->product->discount_price,
                            'unit_price' => $cartItem->product->price,
                        ]);
                        $cartItem->delete();
                    }

                
            });
        }

        return redirect('/')->with('message', 'Order Successfully Placed');
    }

    public function productOrderList($id)
    {

        $orderPlaced = OrderDetail::where('seller_id', $id)->get();

        return view('product-order-list', compact('orderPlaced'));
    }
}

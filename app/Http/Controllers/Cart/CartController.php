<?php

namespace App\Http\Controllers\Cart;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('basket');
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

        if ($request->ajax()) {
            $msg = "";
            DB::transaction(function () use ($request, &$msg) {
                $product = Product::findOrFail($request->productId);

                if (!empty($product) && $product->qty > 0) {

                    # code...
                    $product->qty -= 1;
                    $product->save();

                    //    $product->update(['qty', $product->qty - 1]);

                    $oldProduct = Cart::where(['user_id' => Auth::user()->id, 'product_id' => $product->id])->first();

                    if (!empty($oldProduct) && $oldProduct->count() > 0) {

                        $oldProduct->qty += 1;
                        $oldProduct->save();
                        //      $oldProduct->update(['qty', $oldProduct->qty + 1]);

                        $msg = "Quantity Added";
                    } else {

                        Cart::create([
                            'user_id'    => Auth::user()->id,
                            'product_id' => $product->id,
                            'qty'        => 1,
                        ]);
                        $msg = "Product Added To User Cart";
                    }

                } else {
                    $msg = "Product Out Of Stock";
                }

            });

            return response($msg, 200);
        } else {
            return response('request is not ajax', 200);
        }
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
    public function destroy(Request $request)
    {
        //
        if ($request->ajax()) {
            $msg  = "";
            $cart = Cart::findOrFail($request->cartId);
            DB::transaction(function () use ($request, &$cart, &$msg) {

                $cart->product->qty += $cart->qty;
                $cart->product->save();

                if ($cart->delete()) {
                    $msg = "Product removed from cart successfully";
                } else {
                    $msg = "error removing product from cart";
                }

            });

            return response($msg, 200);
        }

    }

    public function changeQuantity(Request $request)
    {
        if ($request->ajax()) {

            $msg = "";

            $cart = Cart::findOrFail($request->cartId);

            DB::transaction(function () use ($request, &$msg, &$cart) {

                if ($cart->qty > $request->productQuantity) {
                    # code...

                    $cart->product->qty += ($cart->qty - $request->productQuantity);
                    $cart->qty -= ($cart->qty - $request->productQuantity);
                    $cart->product->save();
                    $cart->save();

                    $msg = "Quantity Decremented";

                } else {

                    $cart->product->qty -= ($request->productQuantity - $cart->qty);
                    $cart->qty += ($request->productQuantity - $cart->qty);
                    $cart->product->save();
                    $cart->save();

                    $msg = $cart;
                }
            });

            return response($msg, 200);
        } else {
            return back()->with('error', 'Not A Ajax Request');
        }
    }

}

<?php

namespace App\Http\Controllers\Wishlist;

use App\Http\Controllers\Controller;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
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

        $count = Wishlist::where(['user_id' => Auth::user()->id, 'product_id' => $request->productId])->count();

        if($request->ajax() && $count < 1) {
              $productId = (int) $request->productId;/*
              $unique = DB::table('wishlist')->where('user_id', Auth::user()->id, 'AND', 'product_id', $productId)->count() < 1;
*/  
             Wishlist::create([

                'product_id' => $productId,
                'user_id' => Auth::user()->id,
                ]);   

            return response('Product Added To WishList,'.$productId, 200);
        } else {
            return response('Unable to add, product Already in wishlist', 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BillingInfo  $billingInfo
     * @return \Illuminate\Http\Response
     */
    public function show(BillingInfo $billingInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BillingInfo  $billingInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(BillingInfo $billingInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BillingInfo  $billingInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BillingInfo $billingInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BillingInfo  $billingInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(BillingInfo $billingInfo)
    {
        //
    }


    public function userWishlist() {

        $wishlist = Wishlist::where('user_id', Auth::user()->id)->get();
        foreach($wishlist as $wish) {
            $products[] = $wish->products;
        }
        return view('customer-wishlist', compact('wishlist', 'products'));
      
    }

}

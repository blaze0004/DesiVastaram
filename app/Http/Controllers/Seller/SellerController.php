<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers = User::where('role_id', 2)->paginate(3);

        return view('admin.sellers.index', compact('sellers'));
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
        $userEmail   = User::findOrFail($id)->only('email');
        $userProfile = User::findOrFail($id)->profile;
        $profile = Profile::where('user_id', $id)->first();
        return view('admin.sellers.profile', compact('userEmail', 'userProfile', 'profile'));
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

    public function activateDeactivateAccount($id) {

        $user = User::findOrFail($id);
        $profile = $user->profile;
        
        if ($profile->status == 0) {
            # if deactivated 
            $profile->status = 1;
            if ($profile->save()) {
                # code...
                   return back()->with('message', 'Account Activated');
            }
         

        } else {
            $profile->status = 0;
            
            if ($profile->save()) {
                # code...
                   return back()->with('message', 'Account Deactivated');
            }
        }
    }
}

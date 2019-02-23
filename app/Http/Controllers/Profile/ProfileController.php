<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $userEmail   = Auth::user()->only('email');
        $userProfile = Auth::user()->profile;
        return view('admin.myaccount', compact('userEmail', 'userProfile'));
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
        $profile = Profile::where('user_id', $id)->first();
        return view('admin.myaccount', compact('profile'));
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

        $profile = Profile::where('user_id', $id)->first();

        // Validation Code here

        // update Profile

        if ($request->has('name')) {
            $profile->name = $request->name;
        }

        if ($request->has('phone')) {
            $profile->phone = $request->phone;
        }

        if ($request->has('gender')) {
            $profile->gender = $request->gender;
        }

        if ($request->has('user_name')) {
            # code...
            $profile->user_name = $request->user_name;
        }

        if ($request->has('street')) {
            # code...
            $profile->address = $request->street;

        }

        if ($request->has('email')) {
            # code...
            $profile->user->email = $request->email;
        }

        if ($profile->save()) {
            return back()->with('message', 'Profile Updated Successfully!');
        } else {
            return back()->with('error', 'Error Occured');
        }

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

    // Reset User Password From Old Password
    public function resetPassword(Request $request)
    {

        $user = Auth::user();

        $this->validate($request, [
            'password'         => 'required',
            'password_confirm' => 'required|same:password',
        ]);

        if (Hash::check($request->old_password, $user->password)) {
            $user->fill([
                'password' => Hash::make($request->password),
            ])->save();

            $request->session()->flash('message', 'Password changed');
            return redirect()->route('admin.profile.index');

        } else {
            $request->session()->flash('error', 'Password does not match');
            return redirect()->route('admin.profile.index');
        }

    }
}

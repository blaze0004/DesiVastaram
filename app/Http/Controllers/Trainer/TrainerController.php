<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $trainers = User::where('role_id', 4)->paginate(3);
        return view('admin.trainers.index', compact('trainers'));
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
        $profile     = Profile::where('user_id', $id)->first();
        return view('admin.trainers.profile', compact('userEmail', 'userProfile', 'profile'));
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

    public function activateDeactivateAccount($id)
    {

        $user    = User::findOrFail($id);
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

    public function mytrainee($id)
    {
        $trainees = Profile::where('trainer_id', $id)->paginate(4);


        return view('trainers.my-trainee-list', compact('trainees'));
    }

    public function addtraineeform()
    {


        return view('trainers.add-trainee');
    }


    public function storeNewTraineeUser(Request $request ) {

        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'user_role' => ['required', 'integer', 'min:2', 'max:2']

        ]);

        $user = User::create([
            'email' => $request['email'],
            'role_id' => $request['user_role'],
            'password' => bcrypt($request['password'])
        ]);

        Profile::create([
            'user_id' => $user->id,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'user_name' => $request->user_name,
            'trainer_id' => Auth::id()
        ]);

        return back()->with('message', "Trainee Successfully Created!");
    }

    public function showTraineeDashboard($id) {
        $trainee = Profile::where([
           'id' => $id,
           'trainer_id' => Auth::id() 
        ])->first();

        return view('profile.dashboard', compact('trainee'));
    }


}

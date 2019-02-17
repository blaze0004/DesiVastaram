<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    

    protected function redirectTo() {

            switch (Auth::user()->role->name) {
                 case 'Admin':
                # code...

                return 'admin';
                break;
            case 'Seller':
                return 'seller\dashboard';
                break;

            case 'Buyer':
                return 'buyer\dashboard';
                break;

            case 'Trainer':
                return 'trainer\dashboard';
                break;
            default:
                return '\home';
                break;
        }

    }
}
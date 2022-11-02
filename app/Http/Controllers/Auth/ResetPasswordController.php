<?php

namespace App\Http\Controllers\Auth;

// use Auth;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    // protected function redirectTo(){
    //     if(Auth()->user()->role == 1){
    //         // return 'dashboard';
    //     }elseif(Auth()->user()->role == 0){
    //         return '/';
    //     }
    // }
    protected function redirectTo()
    {
        if(Auth::user()->role_as == '1') //1 = Admin Login
        {
            // return redirect('admin/dashboard')->with('message','WELCOME TO YOUR DASHBOARD');
            return 'dashboard';
        }
        elseif(Auth::user()->role_as == '0') // Normal or Default User Login
        {
            return '/';
        }
    }
}

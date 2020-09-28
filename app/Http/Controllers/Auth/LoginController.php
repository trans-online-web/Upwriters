<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Logs;
use App\User;
use Illuminate\Http\Request;
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
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/home';
    protected function redirectTo()
    {
        if (Auth::check() && Auth::user()->role == 'admin') {
            return ('/dashboard');
        } elseif (Auth::check() && Auth::user()->role == 'student') {
            return ('/');
        }
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = User::where('email', $request->email)->firstOrFail();
            $log = new Logs();
            $log->user_id = $user->id;
            $log->ip_address = $request->ip();
            $log->save();
            if (Auth::check() && Auth::user()->role == 'admin') {
                return redirect()->intended('dashboard');
            } elseif (Auth::check() && Auth::user()->role == 'student') {
                return redirect()->intended('/');
            }

        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

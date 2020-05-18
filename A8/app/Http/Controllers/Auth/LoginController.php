<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getUser()
    {
        return $request->user();
    }

    public function home()
    {
        return redirect('login');
    }

    public function adminLogin(Request $request)
    {
        if ($this->guard('administrator')->attempt($this->credentials($request))) {
            echo 'logged';
        }else{
            echo 'pewwww';
        }
        // if ($this->guard('administrator')->attempt($this->credentials($request), false)) {
        //     $details = $this->guard('administrator')->user();
        //     $user = $details['original'];
        //     return $user;
        // } else {
        //     return 'auth fail';
        // }
    }

    public function showAdminLogin(){
        return view('auth/adminLogin');
    }
}

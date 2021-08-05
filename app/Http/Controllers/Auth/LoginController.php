<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use App\Models\Profile;
use Auth;
use Socialite;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback() {
        $user = Socialite::driver('google')->user();
        // dd($user);
        $this->_registerOrLoginUser($user);
        return redirect('/')->with('success','Login Successfully !');
        // $user->token
    }
    protected function _registerOrLoginUser($data){
        $user = User::where('email','=',$data->email)->first();
        if(!$user){
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->save();
            $user_id = $user->id;
            $profile  = new Profile;
            $profile->user_id = $user_id;
            $profile->save();
        }
        Auth::Login($user);
    }
}

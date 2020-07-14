<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\ActorProfile;
use App\CreatorProfile;

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
    protected $redirectTo = '/home';

    public function redirectTo()
    {
        $user = $this->guard()->user();
        $role = $user->role;
        if($role === 'creator')
        {
            if($user->isCreatedProfile())
            {
                return route('mypage');
            }
            else
            {
                return route('profile.creator.add');
            }
        }

        if($role === 'actor')
        {
            if($user->isCreatedProfile())
            {
                return route('mypage');
            }
            else
            {
                return route('profile.actor.add');
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

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


//    google login part below
    public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($service)
    {
        try {
            $user = Socialite::driver($service)->stateless()->user();
        } catch (\Exception $e) {
            return redirect('/dashboard');
        }

        $existingUser= User::where('email', $user->email)->first();
        if($existingUser)
        {
            auth()->login($existingUser, true);
        }else{
            $newUser                  = new User();
            $newUser->name            = $user->name;
            $newUser->email           = $user->email;
            if($service=='google'){
                $newUser->google_id = $user->id;
            }else if($service == 'facebook'){
                $newUser->facebook_id=$user->user['id'];
            }

            $newUser->avatar          = $user->avatar;
            $newUser->password        = Hash::make(Str::random(10));
            $newUser->save();
            auth()->login($newUser, true);
        }
        return redirect()->to('/dashboard');
    }


}

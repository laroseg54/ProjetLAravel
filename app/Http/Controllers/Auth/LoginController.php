<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Hash; 
use Str; 
use App\User; 

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


    public function provider($provider) {

        return Socialite::driver($provider)->redirect();
    }


    public function redirectToProvider($provider) {

         $user = Socialite::driver($provider)->user();

       // Dans le cas ou le user n'existe pas
        $user = User::firstOrCreate([
                    'email' => $user->email
                ], [
        
                    'name' => $user->name,
                    'password' => Hash::make(Str::random(24)),
                    'role_id' => 2

                ]);

        \Auth::login($user, true);

        return redirect('/');
    }

 
 

 

}

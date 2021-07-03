<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
        $this->middleware('guest', ['except' => ['logout', 'userLogout']]);
    }

    public function userLogout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
return $user->name;
        // $findUser = User::where('email',$userSocial->email)->first();
        // echo "<pre>";
        // print_r($findUser);
        // echo "</pre>";
        // die();
        // if($findUser)
        // {
        //     Auth::login($findUser);
        //     return 'with old';
        // }
        // else
        // {
        //     $user = new User;
        //     $user->name = $userSocial->name;
        //     $user->email = $userSocial->email;
        //     $user->password = bcrypt(12345678);
        //     $user->save();
        //     Auth::login($user);
        //     return 'New';

        // }
    }
}

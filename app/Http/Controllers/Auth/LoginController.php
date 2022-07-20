<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
<<<<<<< HEAD
use Illuminate\Http\Request;
=======
>>>>>>> f42e267055e93b2d6e85ef18981619331b6ee6a1

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

<<<<<<< HEAD
    // use AuthenticatesUsers;
    //redirection après deconnexion
    use AuthenticatesUsers {
        logout as performLogout;
    }
=======
    use AuthenticatesUsers;

>>>>>>> f42e267055e93b2d6e85ef18981619331b6ee6a1
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
<<<<<<< HEAD

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => ["required","email"],
            'password' => ["required"]
        ],
            [
                'email.required' => 'Veuillez remplir le champ.',
                'email.email' => 'Votre email est incorrect.',
                'password.required' => 'Veuillez remplir le champ.'
            ]
        );
    }
    //redirection après déconnexion
    public function logout(Request $request){
        $this->performLogout($request);
        return redirect()->route('sign-in');
    }
=======
>>>>>>> f42e267055e93b2d6e85ef18981619331b6ee6a1
}

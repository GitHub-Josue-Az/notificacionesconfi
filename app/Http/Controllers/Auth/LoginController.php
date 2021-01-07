<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo = 'login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended($this->redirectPath());
    }


    public function authenticate(Request $request)
    {
        $credential = [
                   'codigo' => $request->input('codigo'),
                   'password' => $request->input('password'),
                   'deleted' => 1,
            ];

        if (Auth::attempt($credential)) {
            // Authentication passed...
            return redirect()->route('home');
        }

        return redirect()->route('login')->withErrors('Incorrecto.Verifique e ingrese nuevamente sus crendeciales');
    }


}

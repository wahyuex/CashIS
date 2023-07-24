<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            // Jika autentikasi berhasil
            if (auth()->user()->role_id == '1') {
                return redirect()->route('listobat'); // Ganti dengan rute yang sesuai untuk halaman admin
            } elseif (auth()->user()->role_id == '2') {
                return redirect()->route('homekasir'); // Ganti dengan rute yang sesuai untuk halaman kasir
            }
        }

        // Jika autentikasi gagal
        return redirect()->route('login')->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }
}

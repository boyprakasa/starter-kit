<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $credentials = ['email' => $request->email, 'password' => $request->password];
            $rember = $request->remember_me ? true : false;

            $auth = Auth::attempt($credentials, $rember);

            if ($auth) {
                $status = auth()->user()->status;
                if ($status !== 'active') {
                    auth()->logout();
                    if ($status === 'inactive') {
                        return response()->json(['message' => 'Your account is inactive.'], 401);
                    } elseif ($status === 'suspend') {
                        return response()->json(['message' => 'Your account is suspended'], 401);
                    }
                }

                return redirect()->intended();
            }

            return response()->json(['message' => 'Kata sandi salah!'], 401);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'success' => false,
                'message' => 'Pastikan email & kata sandi benar!',
                // 'error' => $th->getMessage()
            ], 401);
        }
    }
}

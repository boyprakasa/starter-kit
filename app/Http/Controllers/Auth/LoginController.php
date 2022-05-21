<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
    protected $maxAttempts = 5;
    protected $decayMinutes = 1;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated(Request $request, $user)
    {
        if (!$user->hasVerifiedEmail()) {
            return route('verification.notice');
        }

        if ($user->status !== 'active') {
            $this->guard()->logout();
            if ($user->status === 'inactive') {
                return response()->json(['message' => 'Your account is inactive.', 'csrf_token' => csrf_token()], 401);
            } elseif ($user->status === 'suspend') {
                return response()->json(['message' => 'Your account is suspended', 'csrf_token' => csrf_token()], 401);
            }
        }

        return response()->json(['message' => 'Login Success'], 200);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        throw ValidationException::withMessages([
            'email' => $user ? 'Kata sandi salah!' : 'Pengguna tidak ditemukan!'
        ]);
    }
}

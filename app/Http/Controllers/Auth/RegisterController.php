<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\EmailActivation;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'identity_number' => ['required', 'string', 'max:16', 'unique:member_profiles'],
            'gender' => ['required'],
            'phone' => ['required', 'string', 'max:16'],
        ]);

        DB::beginTransaction();
        try {
            $validate['password'] = bcrypt($request->password);

            $user = User::create(collect($validate)->except('identity_number,gender,phone')->toArray());

            $user->memberProfile()->create([
                'identity_number' => $request->identity_number,
                'gender' => $request->gender,
                'phone' => $request->phone
            ]);

            $user->notify(new EmailActivation);

            DB::commit();

            return response()->json(['success' => true, 'message' => 'Silahkan cek email anda untuk aktivasi!']);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }
    }

    public function verify(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = User::findOrFail($request->id);

            if (!hash_equals((string)$request->hash, sha1($user->getEmailForVerification()))) {
                throw new AuthorizationException();
            }

            $user->markEmailAsVerified();

            $user->status = 'active';

            $user->save();

            DB::commit();

            return 'Akun berhasil diaktivasi!';
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return $th->getMessage();
        }
    }
}

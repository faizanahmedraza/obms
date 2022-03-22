<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function show($token)
    {
        return view('web.auth.reset-password', ['token' => $token]);
    }

    public function store(Request $request)
    {
        session()->forget('forgot_password_email');
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        DB::beginTransaction();
        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if (!$updatePassword) {
            return back()->withErrors(['errors' => 'Invalid token!'])->withInput();
        }

        User::where('email', $request->email)->update([
            'password' => bcrypt($request->password)
        ]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();
        DB::commit();

        return redirect()->route('web.login');
    }
}

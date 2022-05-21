<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendForgotPasswordEmail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class CreatePasswordController extends Controller
{
    public function verifyToken($token)
    {
        $user = User::where('verification_token', $token)->first();
        if (!$user) {
            return redirect('/')->with('error', 'Invalid Token or verification link.');
        }
        return view('web.auth.create-password', compact('user'));
    }

    public function createPassword(Request $request, $token)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        try {
            $user = User::where('verification_token', $token)->first();
            if (!$user) {
                return back()->with('error', 'Invalid token!');
            }
            $user->password = $request->password;
            $user->verification_token = null;
            $user->save();

            return redirect()->route('web.signin')->with('success', 'Your account has been successfully activated.');
        } catch (\Exception $e) {
            return back()->withErrors(['errors' => $e->getMessage()]);
        }
    }
}

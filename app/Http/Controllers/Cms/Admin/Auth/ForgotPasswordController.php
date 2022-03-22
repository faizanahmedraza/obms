<?php

namespace App\Http\Controllers\Cms\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendForgotPasswordEmail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('cms.admin.auth.forgot-password');
    }

    public function store(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $email = $request->email;

        session()->forget('forgot_password_email');
        session()->put('forgot_password_email', $email);

        $token = Str::random(64);

        try {
            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => $token,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);

            Mail::to($email)->queue((new SendForgotPasswordEmail($token))->afterCommit());

        } catch (\Exception $e) {
            return back()->withErrors(['errors' => $e->getMessage()]);
        }

        return back()->with('success', 'We have e-mailed you password reset link!');
    }

    public function resendEmailNotification()
    {
        $email = session()->get('forgot_password_email');
        if (!empty($email)) {
            try {
                $token = Str::random(64);

                DB::table('password_resets')->insert([
                    'email' => $email,
                    'token' => $token,
                    'created_at' => Carbon::now()->toDateTimeString(),
                ]);

                Mail::to($email)->queue((new SendForgotPasswordEmail($token))->afterCommit());

                return back()->with('success', 'We have e-mailed you password reset link!');

            } catch (\Exception $e) {
                return back()->withErrors(['errors' => $e->getMessage()]);
            }
        } else {
            return back()->withErrors(['errors' => 'The email field is required']);
        }
    }
}

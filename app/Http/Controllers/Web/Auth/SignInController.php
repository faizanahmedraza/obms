<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SignInController extends Controller
{
    public function index()
    {
        return view('web.auth.signin');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'remember_me' => ['sometimes', 'nullable', 'boolean']
        ]);

        if (Auth::attempt($credentials, $request->has('remember_me'))) {
            $request->session()->regenerate();

            if (Auth::user()->hasRole('Vendor')) {
                return redirect()->intended('vendor/home');
            } else if(Auth::user()->hasRole('Vendor')) {
                return redirect()->intended('venue/home');
            } else {
               return back()->withErrors(['errors' => 'Invalid Credentials!']);
            }
        }

        return back()->withErrors([
            'errors' => 'The provided credentials do not match our records.',
        ]);
    }
}

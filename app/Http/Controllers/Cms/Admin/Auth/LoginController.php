<?php

namespace App\Http\Controllers\Cms\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('cms.admin.auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'remember_me' => ['sometimes','nullable','boolean']
        ]);

        if (Auth::attempt($credentials,$request->has('remember_me'))) {
            $request->session()->regenerate();

            return redirect()->intended('admin/home');
        }

        return back()->withErrors([
            'errors' => 'The provided credentials do not match our records.',
        ]);
    }
}

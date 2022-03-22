<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckBlockedUser
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->blocked_until && now()->lessThan(auth()->user()->blocked_until)) {
            $blocked_days = now()->diffInDays(auth()->user()->blocked_until);
            auth()->logout();

            if ($blocked_days > 14) {
                $message = 'Your account has been suspended. Please contact administrator.';
            } else {
                $message = 'Your account has been suspended for ' . $blocked_days . ' ' . Str::plural('day', $blocked_days) . '. Please contact administrator.';
            }

            if (Str::contains($request->url(), 'admin')) {
                return redirect()->route('admin.login')->with(['message' => $message]);
            } else {
                return redirect()->route('web.login')->with(['message' => $message]);
            }
        }

        return $next($request);
    }
}

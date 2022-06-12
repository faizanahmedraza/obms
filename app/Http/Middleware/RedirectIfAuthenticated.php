<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param string|null ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $url = $request->url();
                if (Str::contains($url, 'admin') && !Auth::user()->hasRole(['Vendor', 'Venue','Customer'])) {
                    return redirect()->route('admin.home');
                } else if (Str::contains($url, 'vendor') && Auth::user()->hasRole('Vendor')) {
                    return redirect()->route('vendor.home');
                } else if (Str::contains($url, 'venue') && Auth::user()->hasRole('Venue')) {
                    return redirect()->route('venue.home');
                } else if (Str::contains($url, 'customer') && Auth::user()->hasRole('Customer')) {
                    return redirect()->route('customer.home');
                }
            }
        }

        return $next($request);
    }
}

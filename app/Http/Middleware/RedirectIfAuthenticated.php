<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{

    private $guard_manage = 'user';
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if ($guard === $this->guard_manage) {
                //user was authenticated with admin guard.
                return redirect()->route('manage');
            } else {
                //default guard.
                return redirect()->route('customer.dashboard');
            }
        }

        return $next($request);
    }
}

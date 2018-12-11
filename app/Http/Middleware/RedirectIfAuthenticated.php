<?php

namespace Koboaccountant\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
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
	        if (Auth::user()->role->name === 'Accountant')
		        return redirect()->route('accountant.dashboard');
	        if (Auth::user()->role->name === 'Client')
		        return redirect()->route('client.dashboard');
	        if (Auth::user()->role->name === 'Superadmin')
		        return redirect()->route('admin.dashboard');
//            return redirect('/login');
        }

        return $next($request);
    }
}

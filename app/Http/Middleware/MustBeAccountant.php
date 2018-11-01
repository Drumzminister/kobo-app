<?php

namespace Koboaccountant\Http\Middleware;

use Closure;

class MustBeAccountant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard($guard)->check()) {
			if (Auth::user()->roles()->name !== 'Accountant')
				return redirect()->route('login');
		}
        return $next($request);
    }
}

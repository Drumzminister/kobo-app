<?php

namespace Koboaccountant\Http\Middleware;

use Closure;

class MustBeAdmin
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
			if (Auth::user()->roles()->name !== 'Admin')
				return redirect()->route('login');
		}
        return $next($request);
    }
}

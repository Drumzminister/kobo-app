<?php

namespace Koboaccountant\Http\Middleware;

use Closure;
use Auth;
class MustBeClient
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

        if (Auth::guard()->check()) {
            if (Auth::user()->role->name !== 'Client' && Auth::user()->isActive == true)
                return redirect()->route('login');
        }
        return $next($request);
    }
}

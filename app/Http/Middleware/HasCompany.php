<?php

namespace Koboaccountant\Http\Middleware;

use Closure;
use Auth;

class HasCompany
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
        if (Auth::user()->company !== null) {
            return $next($request);
        }
        return redirect()->route('company.create');
        
    }
}

<?php

namespace Koboaccountant\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPayment
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
        if (is_null($request->user()->payment_status)) {
            return redirect('/started');
        }
        return $next($request);
    }
}

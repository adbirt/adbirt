<?php

namespace app\Http\Middleware;

use Closure;
use Entrust;

class RedirectIfAdmin
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
        if (!Entrust::hasRole(config('customConfig.roles.admin'))) {
            return redirect('/');
        }
        return $next($request);
    }
}

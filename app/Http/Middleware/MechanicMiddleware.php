<?php

namespace App\Http\Middleware;

use Closure;

class MechanicMiddleware
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
        if (1 != $request->user()->isMechanic) {
            return redirect('home');
        }
        return $next($request);
    }
}

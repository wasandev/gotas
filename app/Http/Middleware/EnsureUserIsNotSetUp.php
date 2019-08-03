<?php

namespace App\Http\Middleware;

use Closure;

class EnsureUserIsNotSetUp
{
    public function handle($request, Closure $next)
    {
        if (auth()->user()->set_up) {
            return redirect('/home');
        }

        return $next($request);
    }
}

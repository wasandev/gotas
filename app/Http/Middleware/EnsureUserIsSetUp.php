<?php

namespace App\Http\Middleware;

use Closure;

class EnsureUserIsSetUp
{
    public function handle($request, Closure $next)
    {
        if (! auth()->user()->set_up) {
            return redirect('/setup');
        }

        return $next($request);
    }
}

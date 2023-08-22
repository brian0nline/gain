<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserStatusMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $status)
    {
        $status = explode('|', $status);


        if (checkUSerActive($status)) {
            return $next($request);
        }

        return abort(403);
    }
}

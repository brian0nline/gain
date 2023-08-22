<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IsDemo
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (env('APP_DEMO')) {
            session()->flash('error', 'Sorry,Not Available in demo version.');
            return back()->withNotify([['error', 'Sorry,Not Available in demo version']]);
        }
        return $next($request);
    }
}

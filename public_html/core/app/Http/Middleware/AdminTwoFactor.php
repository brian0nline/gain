<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AdminTwoFactor
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = auth()->user();
            if ($user->status && $user->ev && $user->sv && $user->tv) {   
                return $next($request);
            } else {
                return redirect()->route('user.authorization');
            }
        }
    }
}

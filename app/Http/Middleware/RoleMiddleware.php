<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\http\Models\User;


class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (Auth::user()->role== 'admin') {
           return $next($request);
        }

        abort(401);

    }
}

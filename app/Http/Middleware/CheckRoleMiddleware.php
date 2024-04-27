<?php

namespace App\Http\Middleware;

use App\Exceptions\RoleDendiedException;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next , $role): Response
    {
        if(!($request->user()->hasRole($role)))
        {
            throw new RoleDendiedException("You Do Not Have To Access This Page Contact To Your Admin");
        }
        return $next($request);
    }
}

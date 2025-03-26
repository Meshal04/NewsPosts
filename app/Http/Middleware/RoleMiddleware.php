<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        
        if (!Auth::check()) {
            abort(Response::HTTP_FORBIDDEN, 'Unauthorized - Please log in');
        }

        
        $user = Auth::user();

        
        if ($user->role !== $role) {
            abort(Response::HTTP_FORBIDDEN, 'Unauthorized - Insufficient permissions');
        }

        return $next($request);
    }
}

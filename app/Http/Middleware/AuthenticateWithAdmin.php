<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Providers\AuthServiceProvider;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateWithAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            if (auth()->user()->is_admin === true) {
                return $next($request);
            } else {
                return redirect(RouteServiceProvider::CLIENT_HOME)->with(['error' => 'You can\'t access this section']);
            }
        }
        return redirect(RouteServiceProvider::HOME)->with(['error' => 'You can\'t access this section']);
    }
}

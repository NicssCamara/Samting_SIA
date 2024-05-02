<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            $user = auth()->user();
            if ($user->isAdmin()) {
                // Set a local variable for admin
                $isAdmin = true;
            } else {
                // Set a local variable for regular user
                $isAdmin = false;
            }
            // Pass the variable to the views
            \View::share('isAdmin', $isAdmin);
        }
        return $next($request);
    }
}

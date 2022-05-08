<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class GestorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->to('/login');
        } else if ($request->user()->nivel != 2) {
            return redirect()->to('/login');
        }
        return $next($request);
    }
}

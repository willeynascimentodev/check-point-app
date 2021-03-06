<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class FuncionarioMiddleware
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
            return redirect()->to('/');
        } else if ($request->user()->nivel != 1) {
            return redirect()->to('/');
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CheckUserBancaExaminadora
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->role == User::ROLE_ENUM['presidenteBancaExaminadora']) {
            return $next($request);
        } else {
            return redirect()->back();
        }
        return $next($request);
    }
}

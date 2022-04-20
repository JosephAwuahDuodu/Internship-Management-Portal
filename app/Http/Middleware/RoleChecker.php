<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class RoleChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (User::is_admin()) {
            return redirect()->route('admin');
        } elseif (User::is_student()) {
            return redirect()->route('student');
        } elseif (User::is_organization()) {
            return redirect()->route('org');
        } else {
            return "No Valid Route";
        }


        return $next($request);
    }
}

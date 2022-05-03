<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogRequestResponse
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
        // Log::alert("\nRequest Details: ");
        Log::alert("\n#################Request Details#################".
        "\nFull Url: ".$request->fullUrl().
        // "\nController Name: ".$request->route()->getController().
        // "\nController Class: ".$request->route()->getControllerClass().
        "\nAction Name: ".$request->route()->getActionName().
        "\n#################Request Details#################"
        );
        return $next($request);
    }
}

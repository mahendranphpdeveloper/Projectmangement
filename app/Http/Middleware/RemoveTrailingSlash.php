<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RemoveTrailingSlash
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $uri = $request->getRequestUri();
        if (substr($uri, -1) === '/' && $uri !== '/') {
            return redirect(rtrim($uri, '/'), 301);
        }

        return $next($request);
    }
}

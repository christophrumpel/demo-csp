<?php

namespace App\Http\Middleware;

use Closure;

class ContentSecurityPolicy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        return $response->header('Content-Security-Policy', "default-src 'self'; style-src https://fonts.googleapis.com 'nonce-1234'; font-src data: https://fonts.gstatic.com");
    }
}

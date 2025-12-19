<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use RuntimeException;
use Symfony\Component\HttpFoundation\Response;

class EnsureJsonResponse
{
    /**
     * @param  Closure(Request): Response  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($request->expectsJson()) {
            $contentType = $response->headers->get('content-type', '');

            if (str_contains($contentType, 'text/html')) {
                throw new RuntimeException('HTML leaked into JSON response');
            }
        }

        return $response;
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RuntimeException;

class EnsureJsonResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (! $request->expectsJson()) {
            return $response;
        }

        $contentType = $response->headers->get('Content-Type', '');
        $isJson = str_contains($contentType, 'application/json');
        $isHtml = str_contains($contentType, 'text/html') || str_contains($contentType, 'text/plain');

        if ($isJson || ! $isHtml) {
            return $response;
        }

        $message = 'Expected JSON response but received HTML for an API request.';

        if (app()->environment(['local', 'testing'])) {
            throw new RuntimeException($message);
        }

        Log::warning($message, [
            'path' => $request->path(),
            'status' => $response->getStatusCode(),
        ]);

        return $response;
    }
}

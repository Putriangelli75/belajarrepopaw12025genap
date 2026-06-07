<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PelangganMiddleware
{
    public function handle(
        Request $request,
        Closure $next
    )
    {
        if (
            auth()->check() &&
            auth()->user()->role == 'pelanggan'
        ) {
            return $next($request);
        }

        abort(403);
    }
}
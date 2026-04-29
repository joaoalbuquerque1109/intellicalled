<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResolveTenantMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! auth()->check()) {
            return $next($request);
        }

        $request->attributes->set('tenant', [
            'company_id' => auth()->user()->company_id,
            'branch_id' => auth()->user()->branch_id,
        ]);

        return $next($request);
    }
}

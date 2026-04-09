<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResolveTenant
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (!$user) {
            return to_route('login');
        }

        $organizationId = session('current_organization_id');
        $organization = $user->organizations()->find($organizationId);

        if (!$organization) {
            abort(403, 'Organization not found or access denied.');
        }

        app()->instance('current_organization', $organization);
        $request->merge(['organization' => $organization]);

        return $next($request);
    }
}

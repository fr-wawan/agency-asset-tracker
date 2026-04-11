<?php

namespace App\Http\Middleware\Onboarding;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureOnboardingIncomplete
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->hasOrganization()) {
            return to_route('onboarding.invite.create');
        }

        return $next($request);
    }
}

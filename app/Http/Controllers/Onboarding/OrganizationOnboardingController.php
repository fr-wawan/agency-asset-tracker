<?php

namespace App\Http\Controllers\Onboarding;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;

class OrganizationOnboardingController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('onboarding/organization');
    }
}

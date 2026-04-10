<?php

namespace App\Http\Controllers\Onboarding;

use App\Actions\Invitation\SendInvitationAction;
use App\Data\Invitation\SendInvitationData;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Response;
use Inertia\Inertia;

class InvitationOnboardingController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('onboarding/invite');
    }

    public function store(SendInvitationData $data, SendInvitationAction $action)
    {
        $action->handle(Auth::user(), $data);

        return to_route('onboarding.invite.create');
    }
}

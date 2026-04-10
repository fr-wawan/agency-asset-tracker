<?php

namespace App\Actions\Invitation;

use App\Data\Invitation\SendInvitationData;
use App\Mail\Invitation\SendInvitationMail;
use App\Models\Invitation;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SendInvitationAction
{
    public function handle(User $user, SendInvitationData $data): Invitation
    {
        $existing = Invitation::where('email', $data->email)
            ->notAccepted()
            ->notExpired()
            ->exists();

        if ($existing) {
            throw new Exception('Invitation already sent to this email address.');
        }

        $invitation = Invitation::create([
            'email' => $data->email,
            'role' => $data->role,
            'token' => Str::random(64),
            'expires_at' => now()->addDays(7),
        ]);

        Mail::to($data->email)->queue(new SendInvitationMail($invitation));

        return $invitation;
    }
}

<x-mail::message>
# You're invited!

{{ $invitation->invitedBy->name }} has invited you to join **{{ $invitation->organization->name }}**.

<x-mail::button :url="route('invitation.show', $invitation->token)">
Accept Invitation
</x-mail::button>

This invitation expires in 7 days.

Thanks,
{{ config('app.name') }}
</x-mail::message>

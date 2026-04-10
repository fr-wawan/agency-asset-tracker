<?php

namespace App\Actions\Organization;

use App\Data\Organization\CreateOrganizationData;
use App\Models\Organization;
use App\Models\User;
use App\Enums\Organization\OrganizationRole;
use App\Enums\Plan;
use Illuminate\Support\Facades\DB;

class CreateOrganizationAction
{
    public function handle(User $user, CreateOrganizationData $data): Organization
    {
        return DB::transaction(function () use ($user, $data) {
            $organization = Organization::create([
                ...$data->toArray(),
                'plan' => Plan::Free,
            ]);

            $user->organizations()->attach($organization->id, [
                'role' => OrganizationRole::Owner,
                'joined_at' => now(),
            ]);

            return $organization;
        });
    }
}

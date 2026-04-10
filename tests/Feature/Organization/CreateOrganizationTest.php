<?php

use App\Actions\Organization\CreateOrganizationAction;
use App\Data\Organization\CreateOrganizationData;
use App\Enums\Organization\OrganizationRole;
use App\Models\Organization;
use App\Models\User;

use function Pest\Laravel\actingAs;

it('create an organization', function () {
    $user = User::factory()->create();

    $data = new CreateOrganizationData(name: 'My Agency');

    $organization = (new CreateOrganizationAction)->handle($user, $data);

    expect($organization)
        ->toBeInstanceOf(Organization::class)
        ->and($organization->name)
        ->toBe('My Agency')
        ->and($organization->timezone)
        ->toBe('UTC');
});

it('assign owner role to creator', function () {
    $user = User::factory()->create();

    $data = new CreateOrganizationData(name: 'My Agency');

    $organization = (new CreateOrganizationAction)->handle($user, $data);

    expect($user->organizations)
        ->toHaveCount(1)
        ->and($user->organizations->first()->pivot->role)
        ->toBe(OrganizationRole::Owner);
});

it('uses UTC as default timezone', function () {
    $user = User::factory()->create();

    $data = new CreateOrganizationData(name: 'My Agency');

    $organization = (new CreateOrganizationAction)->handle($user, $data);

    expect($organization->timezone)->toBe('UTC');
});

it('redirects to invite page after organization created', function () {
    $user = User::factory()->create();
    $data = new CreateOrganizationData(name: 'My Agency', timezone: 'UTC');

    $response = (new CreateOrganizationAction)->handle($user, $data);

    actingAs($user)
        ->post(route('onboarding.organization.store'), [
            'name' => 'My Agency',
        ])
        ->assertRedirect(route('onboarding.invite.create'));
});

it('validates organization name is required', function () {
    $user = User::factory()->create();

    actingAs($user)
        ->post(route('onboarding.organization.store'), [
            'name' => '',
        ])
        ->assertSessionHasErrors('name');
});

it('validates organization name minimum 3 characters', function () {
    $user = User::factory()->create();

    actingAs($user)
        ->post(route('onboarding.organization.store'), [
            'name' => 'AB',
        ])
        ->assertSessionHasErrors('name');
});

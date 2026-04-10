<?php

namespace App\Models;

use App\Concerns\BelongsToOrganization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property string $id
 * @property string $organization_id
 * @property string $email
 * @property string $role
 * @property string $token
 * @property string $invited_by
 * @property string $expires_at
 * @property string|null $accepted_at
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @property-read \App\Models\Organization $organization
 * @method static Builder<static>|Invitation newModelQuery()
 * @method static Builder<static>|Invitation newQuery()
 * @method static Builder<static>|Invitation notAccepted()
 * @method static Builder<static>|Invitation notExpired()
 * @method static Builder<static>|Invitation query()
 * @method static Builder<static>|Invitation whereAcceptedAt($value)
 * @method static Builder<static>|Invitation whereCreatedAt($value)
 * @method static Builder<static>|Invitation whereEmail($value)
 * @method static Builder<static>|Invitation whereExpiresAt($value)
 * @method static Builder<static>|Invitation whereId($value)
 * @method static Builder<static>|Invitation whereInvitedBy($value)
 * @method static Builder<static>|Invitation whereOrganizationId($value)
 * @method static Builder<static>|Invitation whereRole($value)
 * @method static Builder<static>|Invitation whereToken($value)
 * @method static Builder<static>|Invitation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Invitation extends Model
{
    use HasUlids, BelongsToOrganization;

    public function scopeNotAccepted(Builder $query): Builder
    {
        return $query->whereNull('accepted_at');
    }

    public function scopeNotExpired(Builder $query): Builder
    {
        return $query->where('expires_at', '>', now());
    }
}

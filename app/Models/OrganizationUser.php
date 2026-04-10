<?php

namespace App\Models;

use App\Enums\Organization\OrganizationRole;
use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @property string $id
 * @property string $organization_id
 * @property string $user_id
 * @property OrganizationRole $role
 * @property string|null $invited_by
 * @property \Carbon\CarbonImmutable|null $joined_at
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrganizationUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrganizationUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrganizationUser query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrganizationUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrganizationUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrganizationUser whereInvitedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrganizationUser whereJoinedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrganizationUser whereOrganizationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrganizationUser whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrganizationUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrganizationUser whereUserId($value)
 * @mixin \Eloquent
 */
class OrganizationUser extends Pivot
{
    use HasUlids;

    protected $casts = [
        'role' => OrganizationRole::class,
        'joined_at' => 'datetime',
    ];
}

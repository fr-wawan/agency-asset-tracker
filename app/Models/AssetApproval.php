<?php

namespace App\Models;

use App\Concerns\BelongsToOrganization;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $organization_id
 * @property string $asset_id
 * @property string|null $reviewer_id
 * @property string $status
 * @property string|null $notes
 * @property string $submitted_at
 * @property string|null $reviewed_at
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @property-read \App\Models\Organization $organization
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssetApproval newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssetApproval newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssetApproval query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssetApproval whereAssetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssetApproval whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssetApproval whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssetApproval whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssetApproval whereOrganizationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssetApproval whereReviewedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssetApproval whereReviewerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssetApproval whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssetApproval whereSubmittedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssetApproval whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AssetApproval extends Model
{
    use HasUlids, BelongsToOrganization;
}

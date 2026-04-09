<?php

namespace App\Models;

use App\Concerns\BelongsToOrganization;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $organization_id
 * @property string $asset_id
 * @property string $filename
 * @property string $path
 * @property int $size
 * @property string $mime_type
 * @property string|null $uploaded_by
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @property-read \App\Models\Organization $organization
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssetFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssetFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssetFile query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssetFile whereAssetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssetFile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssetFile whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssetFile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssetFile whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssetFile whereOrganizationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssetFile wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssetFile whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssetFile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssetFile whereUploadedBy($value)
 * @mixin \Eloquent
 */
class AssetFile extends Model
{
    use HasUlids, BelongsToOrganization;
}

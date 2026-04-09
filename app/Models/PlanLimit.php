<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

/**
 * @property string $id
 * @property string $plan
 * @property string $limit_key
 * @property int $limit_value
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PlanLimit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PlanLimit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PlanLimit query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PlanLimit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PlanLimit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PlanLimit whereLimitKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PlanLimit whereLimitValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PlanLimit wherePlan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PlanLimit whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PlanLimit extends Model
{
    use HasUlids;
}

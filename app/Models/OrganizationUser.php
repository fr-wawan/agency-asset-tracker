<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

#[Table('organization_user')]
#[Guarded(['id'])]
class OrganizationUser extends Model
{
    use HasUlids;
}

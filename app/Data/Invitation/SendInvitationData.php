<?php

namespace App\Data\Invitation;

use App\Data\BaseData;
use App\Enums\Organization\OrganizationRole;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;
use Illuminate\Validation\Rules\Enum;

#[TypeScript()]
class SendInvitationData extends BaseData
{
    public function __construct(
        public string $email,
        public OrganizationRole $role,
    ) {}

    public static function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'role' => ['required', 'string', new Enum(OrganizationRole::class)->only(OrganizationRole::invitable())],
        ];
    }
}

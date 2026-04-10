<?php

namespace App\Data\Organization;

use App\Data\BaseData;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript()]
class CreateOrganizationData extends BaseData
{
    public function __construct(
        public string $name,
        public string $timezone = 'UTC',
    ) {}

    public static function rules(): array
    {
        return [
            'name' => ['required', 'min:3'],
            'timezone' => 'nullable|string',
        ];
    }
}

<?php

namespace App\Enums\Organization;

enum OrganizationRole: string
{
    case Owner = 'owner';
    case Manager = 'manager';
    case contributor = 'contributor';
    case ClientReviewer = 'client_reviewer';


    public static function invitable(): array
    {
        return [
            self::Manager,
            self::contributor,
            self::ClientReviewer,
        ];
    }
}

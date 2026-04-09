<?php

namespace App\Organization;

enum OrganizationRole: string
{
    case Owner = 'owner';
    case Manager = 'manager';
    case contributor = 'contributor';
    case ClientReviewer = 'client_reviewer';
}

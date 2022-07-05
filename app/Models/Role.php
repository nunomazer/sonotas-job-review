<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieModel;

class Role extends SpatieModel
{
    const SYSTEM_ADMIN = 'system-admin';
}

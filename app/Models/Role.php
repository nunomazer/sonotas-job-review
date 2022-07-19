<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieModel;

class Role extends SpatieModel
{
    const SYSADMIN = 'sys-admin';
    const OWNER = 'owner';
    const MANAGER = 'manager';
}

<?php

namespace Xpander\Entities\Role;

use Xpander\Entity;

class Permission extends Entity
{
    protected $casts = [
        'role_id' => 'integer',
        'permission_id' => 'integer',
        'status_id' => 'integer',
        'c' => 'boolean',
        'r' => 'boolean',
        'u' => 'boolean',
        'd' => 'boolean'
    ];
}

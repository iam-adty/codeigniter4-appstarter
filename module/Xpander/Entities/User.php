<?php

namespace Xpander\Entities;

use Xpander\Entities\User\Permission as UserPermission;
use Xpander\Entities\User\Role as UserRole;
use Xpander\Entity;

class User extends Entity
{
    protected $casts = [
        'status_id' => 'integer',
        'code' => 'string',
        'email' => 'string',
        'name' => 'string',
        'password' => 'string',
    ];

    const RELATION = [
        'hasOne' => [
            'status' => [ 'status_id', Status::class ]
        ],
        'hasMany' => [
            'role' => [ 'id', Role::class, UserRole::class ],
            'permission' => [ 'id', Permission::class, UserPermission::class ]
        ]
    ];
}

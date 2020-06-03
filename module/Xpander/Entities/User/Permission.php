<?php

namespace Xpander\Entities\User;

use Xpander\Entities\Permission as EntitiesPermission;
use Xpander\Entities\Status;
use Xpander\Entities\User;
use Xpander\Entity;

class Permission extends Entity
{
    protected $casts = [
        'status_id' => 'integer',
        'user_id' => 'integer',
        'permission_id' => 'integer',
        'C' => 'boolean',
        'R' => 'boolean',
        'U' => 'boolean',
        'D' => 'boolean'
    ];

    const RELATION = [
        'hasOne' => [
            'status' => [ 'status_id', Status::class ]
        ],
        'isBridgeOf' => [
            'user' => [ 'user_id', User::class ],
            'permission' => [ 'permission_id', EntitiesPermission::class ]
        ]
    ];
}

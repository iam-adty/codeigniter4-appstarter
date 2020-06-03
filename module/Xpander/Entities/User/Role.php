<?php

namespace Xpander\Entities\User;

use Xpander\Entities\Role as EntitiesRole;
use Xpander\Entities\Status;
use Xpander\Entity;
use Xpander\Models\User;

class Role extends Entity
{
    protected $casts = [
        'status_id' => 'integer',
        'user_id' => 'integer',
        'role_id' => 'integer'
    ];

    const RELATION = [
        'hasOne' => [
            'status' => [ 'status_id', Status::class ]
        ],
        'isBridgeOf' => [
            'user' => [ 'user_id', User::class ],
            'role' => [ 'role_id', EntitiesRole::class ]
        ]
    ];
}

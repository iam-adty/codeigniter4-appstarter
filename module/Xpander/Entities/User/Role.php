<?php

namespace Xpander\Entities\User;

use Xpander\Entity;

class Role extends Entity
{
    protected $casts = [
        'status_id' => 'integer',
        'user_id' => 'integer',
        'role_id' => 'integer'
    ];

    const RELATION = [
        'hasOne' => [
            'status' => [
                'status_id', \Xpander\Entities\Status::class
            ],
        ],
        'isBridgeOf' => [
            'user' => [
                'user_id', \Xpander\Entities\User::class
            ],
            'role' => [
                'role_id', \Xpander\Entities\Role::class
            ],
        ],
    ];
}

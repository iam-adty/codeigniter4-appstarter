<?php

namespace Xpander\Entities\User;

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
            'status' => [
                'status_id', \Xpander\Entities\Status::class
            ],
        ],
        'isBridgeOf' => [
            'user' => [
                'user_id', \Xpander\Entities\User::class
            ],
            'permission' => [
                'permission_id', \Xpander\Entities\Permission::class
            ],
        ],
    ];
}

<?php

namespace Xpander\Entities;

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

    const SCHEMA = [
        'role' => [
            Role::class,
            '$pivot' => [
                \Xpander\Entities\User\Role::class,
                '$source' => 'user_id',
                '$target' => 'role_id',
                'status' => [
                    Status::class,
                    '$source' => 'status_id',
                ],
            ],
            'permission' => [
                Permission::class,
                '$pivot' => [
                    \Xpander\Entities\Role\Permission::class,
                    '$source' => 'role_id',
                    '$target' => 'permission_id',
                    'status' => [
                        Status::class,
                        '$source' => 'status_id',
                    ],
                ],
                'status' => [
                    Status::class,
                    '$source' => 'status_id',
                ],
            ],
            'status' => [
                Status::class,
                '$source' => 'status_id',
            ],
        ],
        'permission' => [
            Permission::class,
            '$pivot' => [
                \Xpander\Entities\User\Permission::class,
                '$source' => 'user_id',
                '$target' => 'permission_id',
                'status' => [
                    Status::class,
                    '$source' => 'status_id',
                ],
            ],
            'status' => [
                Status::class,
                '$source' => 'status_id',
            ],
        ],
        'status' => [
            Status::class,
            '$source' => 'status_id',
        ],
    ];
}

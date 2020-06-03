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

    const RELATION = [
        'hasOne' => [
            'status' => [
                'status_id', Status::class
            ]
        ],
        'hasMany' => [
            'role' => [
                'id', Role::class, \Xpander\Entities\User\Role::class
            ],
            'permission' => [
                'id', Permission::class, \Xpander\Entities\User\Permission::class
            ]
        ]
    ];
}

<?php

namespace Xpander\Entities;

use Xpander\Entity;

class Role extends Entity
{
    protected $casts = [
        'code' => 'string',
        'name' => 'string',
        'description' => 'string',
        'status_id' => 'integer',
        'level' => 'integer',
        'parent_id' => 'integer'
    ];

    const RELATION = [
        'hasOne' => [
            'status' => [
                'status_id', Status::class
            ],
        ],
        'hasMany' => [
            'permission' => [
                'id', Permission::class, \Xpander\Entities\Role\Permission::class
            ],
        ],
    ];
}

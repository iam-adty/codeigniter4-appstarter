<?php

namespace Xpander\Entities\Role;

use Xpander\Entity;

class Permission extends Entity
{
    protected $casts = [
        'role_id' => 'integer',
        'permission_id' => 'integer',
        'status_id' => 'integer',
        'C' => 'boolean',
        'R' => 'boolean',
        'U' => 'boolean',
        'D' => 'boolean'
    ];

    protected $datamap = [
        'C' => 'isCreate',
        'R' => 'isRead',
        'U' => 'isUpdate',
        'D' => 'isDelete'
    ];

    const RELATION = [
        'hasOne' => [
            'status' => [
                'status_id', \Xpander\Entities\Status::class,
            ],
        ],
        'isBridgeOf' => [
            'role' => [
                'role_id', \Xpander\Entities\Role::class
            ],
            'permission' => [
                'permission_id', \Xpander\Entities\Permission::class
            ],
        ],
    ];
}

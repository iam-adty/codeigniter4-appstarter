<?php

namespace Xpander\Entities;

use Xpander\Entity;

class Permission extends Entity
{
    protected $casts = [
        'code' => 'string',
        'name' => 'string',
        'description' => 'string',
        'status_id' => 'integer'
    ];

    const RELATION = [
        'hasOne' => [
            'status' => [
                'status_id', Status::class
            ],
        ],
    ];
}

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
}

<?php

namespace Xpander\Entities;

use Xpander\Entity;

class Menu extends Entity
{
    protected $casts = [
        'parent_id' => 'integer',
        'status_id' => 'integer',
        'type_id' => 'integer',
        'code' => 'string',
        'name' => 'string',
        'description' => 'string',
        'url' => 'string',
        'icon' => 'string',
        'level' => 'integer',
        'sequence_position' => 'integer'
    ];
}

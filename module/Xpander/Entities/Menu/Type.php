<?php

namespace Xpander\Entities\Menu;

use Xpander\Entity;

class Type extends Entity
{
    protected $casts = [
        'status_id' => 'integer',
        'code' => 'string',
        'name' => 'string',
        'description' => 'string'
    ];
}

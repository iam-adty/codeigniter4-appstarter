<?php

namespace Xpander\Entities\Process;

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

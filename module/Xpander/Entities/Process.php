<?php

namespace Xpander\Entities;

use Xpander\Entity;

class Process extends Entity
{
    protected $casts = [
        'status_id' => 'integer',
        'type_id' => 'integer',
        'code' => 'string',
        'name' => 'string',
        'description' => 'string',
        'property' => 'json'
    ];
}

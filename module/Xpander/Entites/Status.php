<?php

namespace Xpander\Entities;

use Xpander\Entity;

class Status extends Entity
{
    protected $casts = [
        'code' => 'string',
        'name' => 'string',
        'description' => 'string'
    ];
}

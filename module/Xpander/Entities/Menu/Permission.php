<?php

namespace Xpander\Entities\Menu;

use Xpander\Entity;

class Permission extends Entity
{
    protected $casts = [
        'status_id' => 'integer',
        'menu_id' => 'integer',
        'permission_id' => 'integer',
        'C' => 'boolean',
        'R' => 'boolean',
        'U' => 'boolean',
        'D' => 'boolean',
    ];

    protected $datamap = [
        'C' => 'isCreate',
        'R' => 'isRead',
        'U' => 'isUpdate',
        'D' => 'isDelete'
    ];
}

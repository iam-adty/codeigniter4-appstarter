<?php

namespace Xpander\Models\Menu;

use Xpander\Entities\Menu\Permission as MenuPermission;
use Xpander\Model;

class Permission extends Model
{
    protected $table = 'menu_permission';
    protected $allowedFields = [
        'status_id', 'menu_id', 'permission_id', 'C', 'R', 'U', 'D'
    ];
    protected $returnType = MenuPermission::class;
}

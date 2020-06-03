<?php

namespace Xpander\Models\Role;

use Xpander\Entities\Role\Permission as RolePermission;
use Xpander\Model;

class Permission extends Model
{
    protected $table = 'permission';
    protected $allowedFields = [
        'role_id', 'permission_id', 'status_id', 'C', 'R', 'U', 'D'
    ];
    protected $returnType = RolePermission::class;
}

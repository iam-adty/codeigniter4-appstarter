<?php

namespace Xpander\Models\User;

use Xpander\Entities\User\Permission as UserPermission;
use Xpander\Model;

class Permission extends Model
{
    protected $table = 'user_permission';
    protected $allowedFields = [
        'status_id', 'user_id', 'permission_id', 'C', 'R', 'U', 'D'
    ];
    protected $returnType = UserPermission::class;
}

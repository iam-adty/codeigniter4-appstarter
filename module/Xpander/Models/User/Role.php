<?php

namespace Xpander\Models\User;

use Xpander\Entities\User\Role as UserRole;
use Xpander\Model;

class Role extends Model
{
    protected $table = 'user_role';
    protected $allowedFields = [
        'status_id', 'user_id', 'role_id'
    ];
    protected $returnType = UserRole::class;
}

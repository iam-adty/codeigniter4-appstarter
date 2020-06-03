<?php

namespace Xpander\Models;

use Xpander\Entities\Role as EntitiesRole;
use Xpander\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $allowedFields = [
        'code', 'name', 'description', 'status_id', 'level', 'parent_id'
    ];
    protected $returnType = EntitiesRole::class;
}

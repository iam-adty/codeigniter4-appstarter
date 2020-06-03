<?php

namespace Xpander\Models;

use Xpander\Entities\Permission as EntitiesPermission;
use Xpander\Model;

class Permission extends Model
{
    protected $table = 'permission';
    protected $allowedFields = [
        'code', 'name', 'description', 'status_id'
    ];
    protected $returnType = EntitiesPermission::class;
}
